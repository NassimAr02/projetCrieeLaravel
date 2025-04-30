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
        // Récupération des paramètres
        $idAcheteur = $request->idAcheteur;
        $idBateau = $request->idBateau;
        $datePeche = $request->datePeche;
        $idLot = $request->idLot;

        // Configuration SSE
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');
        header('Connection: keep-alive');
        header('X-Accel-Buffering: no');

        // Vérification de l'acheteur
        $acheteur = Acheteur::find($idAcheteur);
        if (!$acheteur) {
            echo "event: error\n";
            echo "data: Acheteur non trouvé\n\n";
            ob_flush();
            flush();
            return;
        }

        // Boucle de surveillance des enchères
        while (true) {
            // Récupération de la dernière enchère pour ce lot
            $derniereEnchere = Poster::where('idBateau', $idBateau)
                ->where('datePeche', $datePeche)
                ->where('idLot', $idLot)
                ->orderBy('prixEnchere', 'desc')
                ->orderBy('heureEnchere', 'desc')
                ->first();

            if ($derniereEnchere) {
                $eventData = [
                    'type' => 'mise_a_jour_enchere',
                    'prixEnchere' => $derniereEnchere->prixEnchere,
                    'heureEnchere' => $derniereEnchere->heureEnchere,
                    'idAcheteur' => $derniereEnchere->idAcheteur,
                    'estVotreEnchere' => ($derniereEnchere->idAcheteur == $idAcheteur),
                    'datePeche' => $derniereEnchere->datePeche,
                    'idLot' => $derniereEnchere->idLot
                ];

                echo "data: " . json_encode($eventData) . "\n\n";
            }

            // Vérification si l'enchère est terminée (vous devrez adapter cette logique)
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

            ob_flush();
            flush();
            
            // Pause avant la prochaine vérification
            sleep(1);

            if (connection_aborted()) {
                break;
            }
        }
    }

    public function placerEnchere(Request $request)
    {
        $request->validate([
            'idAcheteur' => 'required|exists:acheteur,idAcheteur',
            'idBateau' => 'required',
            'datePeche' => 'required|date',
            'idLot' => 'required',
            'prixEnchere' => 'required|numeric|min:0'
        ]);

        // Vérifier si le lot existe
        $lot = Lot::where('idBateau', $request->idBateau)
            ->where('datePeche', $request->datePeche)
            ->where('idLot', $request->idLot)
            ->first();

        if (!$lot) {
            return response()->json(['error' => 'Lot non trouvé'], 404);
        }

        // Vérifier si l'enchère est toujours ouverte
        if ($lot->estTermine) {
            return response()->json(['error' => 'L\'enchère pour ce lot est terminée'], 400);
        }

        // Créer la nouvelle enchère
        $enchere = new Poster();
        $enchere->idAcheteur = $request->idAcheteur;
        $enchere->idBateau = $request->idBateau;
        $enchere->datePeche = $request->datePeche;
        $enchere->idLot = $request->idLot;
        $enchere->prixEnchere = $request->prixEnchere;
        $enchere->heureEnchere = Carbon::now()->toTimeString();
        $enchere->save();

        return response()->json([
            'success' => 'Enchère placée avec succès',
            'enchere' => $enchere
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