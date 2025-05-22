<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Criee;
use App\Models\Lot;
use App\Models\Poster;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Models\Panier;
class lotCommissaireController extends Controller
{

    public function index($criee) {
        try {
            // Récupérer la criée
            $prochaineCriee = Criee::findOrFail($criee);

            // Récupérer un lot "En attente"
            $lotEnAttente = Lot::where('idCriee', $criee)
                ->where('codeEtat', 'En attente')
                ->first();

            if ($lotEnAttente) {
                // Mettre à jour le lot "En attente" pour le passer "En vente"
                DB::table('lot')
                    ->where('idBateau', $lotEnAttente->idBateau)
                    ->where('datePeche', $lotEnAttente->datePeche)
                    ->where('idLot', $lotEnAttente->idLot)
                    ->update([
                        'codeEtat' => 'En vente',
                        'dateEnchere' => Carbon::now('Europe/Paris')->format('Y-m-d'),
                        'heureDebutEnchere' => Carbon::now('Europe/Paris')->format('H:i:s'),
                    ]);

                // Récupérer le lot mis à jour
                $lot = Lot::where('idBateau', $lotEnAttente->idBateau)
                    ->where('datePeche', $lotEnAttente->datePeche)
                    ->where('idLot', $lotEnAttente->idLot)
                    ->first();
                if ($lot) {
                    $lot->datePeche = Carbon::parse($lot->datePeche);
                }
            } else {
                // Si aucun lot "En attente" n'existe, récupérer le premier lot "En vente"
                $lot = Lot::where('idCriee', $criee)
                    ->where('codeEtat', 'En vente')
                    ->first();
                if ($lot) {
                    $lot->datePeche = Carbon::parse($lot->datePeche);
                }
                if (!$lot) {
                    // Si aucun lot "En vente" n'existe, retourner un message d'erreur
                    return back()->with('error', 'Aucun lot disponible pour cette criée.');
                }
            }

            // Récupérer les enchères max pour le lot en vente
            $dernierPrix = Poster::where('idBateau', $lot->idBateau)
                ->where('datePeche', $lot->datePeche)
                ->where('idLot', $lot->idLot)
                ->orderBy('tempsEnregistrement', 'desc')
                ->value('prixEnchere');

            // Si aucun prix n'est trouvé, utilisez le prix de départ
            $lot->prixActuel = $dernierPrix ?? $lot->prixDepart;

            // Retourner la vue avec les données
            return view('commissaire.lotCommissaire', compact('prochaineCriee', 'lot'));
        } catch (\Exception $e) {
            // Journaliser l'erreur pour le débogage
            Log::error('Erreur dans la méthode index: ' . $e->getMessage());
            Log::error('Trace: ' . $e->getTraceAsString());

            // Retourner une erreur à l'utilisateur
            return back()->with('error', 'Une erreur est survenue: ' . $e->getMessage());
        }
    }
    

    public function enchereDescendante(Request $req)
    {
        // Validation des données
        $validated = $req->validate([
            'idBateau' => 'required|exists:lot,idBateau',
            'datePeche' => 'required|exists:lot,datePeche',
            'idLot' => 'required|exists:lot,idLot'
        ]);

        // Récupérer le dernier prix enchéri ou le prix de départ
        $dernierPrix = Poster::where('idLot', $validated['idLot'])
            ->orderBy('tempsEnregistrement', 'desc')
            ->value('prixEnchere');

        if (!$dernierPrix) {
            // Si aucune enchère n'existe, utiliser le prix de départ
            $dernierPrix = DB::table('lot')
                ->where('idLot', $validated['idLot'])
                ->value('prixDepart');
        }

        // Décrémentation de 2 euros
        $nouveauPrix = $dernierPrix - 2;

        // Vérifier que le prix ne descend pas en dessous du prix plancher
        $prixPlancher = DB::table('lot')
            ->where('idLot', $validated['idLot'])
            ->value('prixPlancher');

        if ($nouveauPrix < $prixPlancher) {
            return back()->with('error', 'Le prix ne peut pas descendre en dessous du prix plancher.');
        }

        // Insérer une nouvelle enchère dans la table Poster
        Poster::create([
            'idBateau' => $validated['idBateau'],
            'datePeche' => $validated['datePeche'],
            'idLot' => $validated['idLot'],
            'idAcheteur' => 999, // ID spécial pour enchères automatiques
            'prixEnchere' => $nouveauPrix,
        ]);

        // Mettre à jour le prix actuel dans la table Lot
        Lot::where('idLot', $validated['idLot'])
            ->update(['prixEnchereMax' => $nouveauPrix]);

        return back()->with('success', 'Enchère descendante enregistrée avec succès.');
    }

        public function finEnchere(Request $req)
        {
            $auj8 = Carbon::now('Europe/Paris')->format('Y-m-d');
            $aujHeure = Carbon::now('Europe/Paris')->format('H:i:s');
            $validated = $req->validate([
                'idBateau' => 'required|exists:lot,idBateau',
                'datePeche' => 'required|exists:lot,datePeche',
                'idLot' => 'required|exists:lot,idLot',
            ]);
            $dernierSaisie = Poster::where('idBateau', $validated['idBateau'])
                ->where('datePeche', $validated['datePeche'])
                ->where('idLot', $validated['idLot'])
                ->orderBy('tempsEnregistrement', 'desc')
                ->first();
           
            $updated2 = false;
            $updated3 = false;
            // Mise à jour directe avec update()
            $updated = Lot::where('idBateau', $validated['idBateau'])
                          ->where('datePeche', $validated['datePeche'])
                          ->where('idLot', $validated['idLot'])
                          ->update(['codeEtat' => 'Terminee']);
                          if ($dernierSaisie) {
                            $lePanier = Panier::where('idAcheteur', $dernierSaisie->idAcheteur)
                                ->where('datePanier', $auj8)
                                ->first();

                            if ($lePanier) {
                                $lePanier->update(['total' => $dernierSaisie->prixEnchere]);
                            } else {
                                // Si aucun panier n'existe, vous pouvez en créer un ou gérer l'erreur
                                $lePanier = Panier::create([
                                    'idAcheteur' => $dernierSaisie->idAcheteur,
                                    'total' => $dernierSaisie->prixEnchere,
                                ]);
                            }
                            $updated2 = Lot::where('idBateau', $validated['idBateau'])
                                          ->where('datePeche', $validated['datePeche'])
                                          ->where('idLot', $validated['idLot'])
                                          ->update(['prixEnchereMax' => $dernierSaisie->prixEnchere, 
                                                    'idAcheteur' => $dernierSaisie->idAcheteur,
                                                    'idPanier' => $lePanier->idPanier]);
                            
                        } else {
                            $prixPlancher = Lot::where('idBateau', $validated['idBateau'])
                                               ->where('datePeche', $validated['datePeche'])
                                               ->where('idLot', $validated['idLot'])
                                               ->value('prixPlancher');
                        
                            $updated3 = Lot::where('idBateau', $validated['idBateau'])
                                          ->where('datePeche', $validated['datePeche'])
                                          ->where('idLot', $validated['idLot'])
                                          ->update(['prixEnchereMax' => $prixPlancher]);
                        }
            if ($updated && ($updated2 || $updated3)) {
                return back()->with('success', 'Enchère terminée.');
            } else {
                return back()->with('error', 'Impossible de terminer l\'enchère.');
            }
        }
}
