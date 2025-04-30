<?php

namespace App\Http\Controllers\Acheteur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Acheteur;
use App\Models\Poster;
use App\Models\Panier;
use App\Models\Lot;
use Carbon\Carbon;

class SseEnchereController extends Controller
{
    public function suivreEnchere(Request $request)
    {
        $idAcheteur = $request->idAcheteur;
        $idBateau = $request->idBateau;
        $datePeche = $request->datePeche;
        $idLot = $request->idLot;

        // Headers SSE
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        header('Connection: keep-alive');
        header('X-Accel-Buffering: no');

        // Vérification de l'existence de l'acheteur
        $acheteur = Acheteur::find($idAcheteur);
        if (!$acheteur) {
            echo "event: error\n";
            echo "data: Acheteur non trouvé\n\n";
            ob_flush();
            flush();
            return;
        }

        // Dernier prix connu pour comparaison
        $dernierPrix = null;
        $dernierAcheteur = null;
        $dernierHeure = null;

        while (true) {
            // Vérifie si la connexion client est encore active
            if (connection_aborted()) {
                break;
            }

            // Récupère la dernière enchère pour ce lot
            $derniereEnchere = Poster::where('idBateau', $idBateau)
                ->where('datePeche', $datePeche)
                ->where('idLot', $idLot)
                ->orderBy('prixEnchere', 'desc')
                ->orderBy('heureEnchere', 'desc')
                ->first();

            if ($derniereEnchere) {
                $prix = $derniereEnchere->prixEnchere;
                $acheteurEnchere = $derniereEnchere->idAcheteur;
                $heure = $derniereEnchere->heureEnchere;

                // Envoie uniquement si l'enchère a changé
                if ($prix != $dernierPrix || $acheteurEnchere != $dernierAcheteur || $heure != $dernierHeure) {
                    $dernierPrix = $prix;
                    $dernierAcheteur = $acheteurEnchere;
                    $dernierHeure = $heure;

                    $eventData = [
                        'type' => 'mise_a_jour_enchere',
                        'prixEnchere' => $prix,
                        'heureEnchere' => $heure,
                        'idAcheteur' => $acheteurEnchere,
                        'estVotreEnchere' => ($acheteurEnchere == $idAcheteur),
                        'datePeche' => $derniereEnchere->datePeche,
                        'idLot' => $derniereEnchere->idLot
                    ];

                    echo "data: " . json_encode($eventData) . "\n\n";
                    ob_flush();
                    flush();
                }
            }

            // Vérifie si le lot est clôturé
            $lot = Lot::where('idBateau', $idBateau)
                ->where('datePeche', $datePeche)
                ->where('idLot', $idLot)
                ->first();

            if ($lot && $lot->codeEtat == "Cloturé") {
                echo "event: fin_enchere\n";
                echo "data: L'enchère est terminée\n\n";
                ob_flush();
                flush();
                break;
            }

            sleep(1);
        }
    }


    public function placerEnchere(Request $request)
    {
        $validated = $request->validate([
            'idAcheteur' => 'required|exists:acheteur,idAcheteur',
            'idBateau' => 'required|exists:lot,idBateau',
            'datePeche' => 'required|date',
            'idLot' => 'required|exists:lot,idLot',
            'prixEnchere' => 'required|numeric|min:0.01' // Minimum 1 centime
        ]);

        $lot = Lot::where('idBateau', $validated['idBateau'])
            ->where('datePeche', $validated['datePeche'])
            ->where('idLot', $validated['idLot'])
            ->firstOrFail();

        if ($lot->codeEtat == "Cloturé") {
            return response()->json([
                'success' => false,
                'message' => 'L\'enchère pour ce lot est terminée'
            ], 400);
        }

        $derniereEnchere = Poster::where('idBateau', $validated['idBateau'])
            ->where('datePeche', $validated['datePeche'])
            ->where('idLot', $validated['idLot'])
            ->orderBy('prixEnchere', 'desc')
            ->first();

        $prixMinimum = $derniereEnchere ? $derniereEnchere->prixEnchere : $lot->prixDepart;

        if ($validated['prixEnchere'] <= $prixMinimum) {
            return response()->json([
                'success' => false,
                'message' => 'Le prix doit être supérieur à '.number_format($prixMinimum, 2).'€'
            ], 400);
        }

        $enchere = Poster::create([
            'idAcheteur' => $validated['idAcheteur'],
            'idBateau' => $validated['idBateau'],
            'datePeche' => $validated['datePeche'],
            'idLot' => $validated['idLot'],
            'prixEnchere' => $validated['prixEnchere'],
            'heureEnchere' => now()->toTimeString()
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Enchère placée avec succès',
            'newPrice' => $validated['prixEnchere']
        ]);
    }
    public function ajouterAuPanier(Request $request)
    {
        $request->validate([
            'idAcheteur' => 'required|exists:acheteur,idAcheteur',
            'idBateau' => 'required',
            'datePeche' => 'required|date',
            'idLot' => 'required'
        ]);

        // Vérifier si l'acheteur a gagné l'enchère
        $enchereGagnante = Poster::where('idBateau', $request->idBateau)
            ->where('datePeche', $request->datePeche)
            ->where('idLot', $request->idLot)
            ->orderBy('prixEnchere', 'desc')
            ->first();

        if (!$enchereGagnante || $enchereGagnante->idAcheteur != $request->idAcheteur) {
            return response()->json(['error' => 'Vous n\'avez pas remporté cette enchère'], 403);
        }

        // Ajouter au panier
        $panier = Panier::firstOrCreate(
            ['idAcheteur' => $request->idAcheteur],
            ['total' => 0]
        );

        // Mettre à jour le total (vous devrez adapter selon votre logique métier)
        $panier->total += $enchereGagnante->prixEnchere;
        $panier->save();

        return response()->json([
            'success' => 'Lot ajouté au panier',
            'panier' => $panier
        ]);
    }
}