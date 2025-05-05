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

class lotCommissaireController extends Controller
{
    public function index($criee) {
        try {
            // Récupérer la criée
            $prochaineCriee = Criee::findOrFail($criee);
            
            // Récupérer directement tous les lots liés à cette criée
            // sans passer par la relation
            $lotEnAttente = Lot::where('idCriee', $criee)
                             ->where('codeEtat', 'En attente')
                             ->first();
            
            // Vérifier si un lot a été trouvé
            if ($lotEnAttente) {
                // Mise à jour manuelle pour éviter les problèmes
                DB::table('lot')
                    ->where('idBateau', $lotEnAttente->idBateau)
                    ->where('datePeche', $lotEnAttente->datePeche)
                    ->where('idLot', $lotEnAttente->idLot)
                    ->update(['codeEtat' => 'En vente']);
                
                // Récupérer le lot mis à jour
                $lot = Lot::where('idBateau', $lotEnAttente->idBateau)
                         ->where('datePeche', $lotEnAttente->datePeche)
                         ->where('idLot', $lotEnAttente->idLot)
                         ->first();
            } else {
                $lot = Lot::where('idCriee', $criee)
                ->where('codeEtat', 'En vente')
                ->first();
                if ($lot) {
                    $lot->datePeche = Carbon::parse($lot->datePeche);
                }
            }
            
            $prixMaxParLot = DB::table('lot')
                ->select('idLot', DB::raw('MAX(prixDepart) as prixMax'))
                ->groupBy('idLot')
                ->get()
                ->keyBy('idLot') // Utilise 'idLot' comme clé
                ->map(function ($item) {
                    return $item->prixMax; // Retourne uniquement 'prixMax' comme valeur
                })
                ->toArray(); // Convertit en tableau associatif
        
            return view('commissaire.lotCommissaire', compact('prochaineCriee', 'lot', 'prixMaxParLot'));
        } catch (\Exception $e) {
            // Journaliser l'erreur pour le débogage
            Log::error('Erreur dans la méthode index: ' . $e->getMessage());
            Log::error('Trace: ' . $e->getTraceAsString());
            
            // Retourner une erreur à l'utilisateur
            return back()->with('error', 'Une erreur est survenue: ' . $e->getMessage());
        }
    }
    

    // public function debutEnchere(Request $req)
    // {
    //     $validated = $req->validate([
    //         'idBateau' => 'required|exists:lot,idBateau',
    //         'datePeche' => 'required|exists:lot,datePeche',
    //         'idLot' => 'required|exists:lot,idLot',
    //     ]);
    
    //     // Mise à jour directe avec update()
    //     $updated = Lot::where('idBateau', $validated['idBateau'])
    //                   ->where('datePeche', $validated['datePeche'])
    //                   ->where('idLot', $validated['idLot'])
    //                   ->update(['codeEtat' => 'En vente']);
    
    //     if ($updated) {
  
    //         return back()->with('success', 'Enchère terminée.');
    //     } else {
    //         return back()->with('error', 'Impossible de terminer l\'enchère.');
    //     }
    // }
    public function enchereAscendante(Request $req)
    {
        $validated = $req->validate([
            'idBateau' => 'required|exists:lot,idBateau',
            'datePeche' => 'required|exists:lot,datePeche',
            'idLot' => 'required|exists:lot,idLot',
            'idAcheteur' => 'required|exists:acheteur,idAcheteur',
        ]);
        $prixEnchere = DB::table('lot')
            ->where('idLot', $validated['idLot'])
            ->value('prixDepart');
        $prixEnchere = $prixEnchere - 2 ; // Décrémentation de 1 euro
        
        // Insertion dans la table enchere
        Poster::create([
            'idBateau' => $validated['idBateau'],
            'datePeche' => $validated['datePeche'],
            'idLot' => $validated['idLot'],
            'idAcheteur' => $validated['idAcheteur'],
            'prixEnchere' => $prixEnchere,
        ]);

        return back()->with('success', 'Enchère en cours.');
    }

        public function finEnchere(Request $req)
        {
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
            if ($dernierSaisie) {}
            // Mise à jour directe avec update()
            $updated = Lot::where('idBateau', $validated['idBateau'])
                          ->where('datePeche', $validated['datePeche'])
                          ->where('idLot', $validated['idLot'])
                          ->update(['codeEtat' => 'Terminee']);
                          if ($dernierSaisie) {
                            $updated2 = Lot::where('idBateau', $validated['idBateau'])
                                          ->where('datePeche', $validated['datePeche'])
                                          ->where('idLot', $validated['idLot'])
                                          ->update(['prixEnchereMax' => $dernierSaisie->prixEnchere]);
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
            if ($updated && $updated2 && $updated3) {
                return back()->with('success', 'Enchère terminée.');
            } else {
                return back()->with('error', 'Impossible de terminer l\'enchère.');
            }
        }
}
