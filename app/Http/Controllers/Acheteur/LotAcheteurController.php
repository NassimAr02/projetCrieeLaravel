<?php

namespace App\Http\Controllers\Acheteur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Criee;
use App\Models\Lot;
use App\Models\Panier;
use App\Models\Poster;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class LotAcheteurController extends Controller
{
    
   // Charge les criees avenir
   public function index() {
       $auj8 = Carbon::now('Europe/Paris')->format('Y-m-d');
       $prochaineCriee = Criee::where('dateCriee', '>=', $auj8)
                       ->orderBy('dateCriee')
                       ->first();
   
       // Conversion manuelle si nécessaire
       if ($prochaineCriee) {
           $prochaineCriee->dateCriee = \Carbon\Carbon::parse($prochaineCriee->dateCriee);
       }
   
       $criees = Criee::where('dateCriee', '>=', Carbon::now())
                   ->orderBy('dateCriee')
                   ->get();
   
       $lot = Lot::with(['qualite', 'espece', 'taille'])
           ->where('idCriee', $prochaineCriee->idCriee ?? null)
           ->first();
   
       // Vérifier si le lot est en vente
       if ($lot && $lot->codeEtat !== 'En vente') {
           return back()->with('error', 'Le lot sélectionné n\'est pas encore disponible pour enchérir.');
       }
   
       // On récupère les enchères max groupées par lot
       $prixMaxParLot = Poster::select('idLot', DB::raw('MAX(prixEnchere) as prix_max'))
           ->groupBy('idLot')
           ->pluck('prix_max', 'idLot'); // Associe idLot => prix_max
   
       $idAcheteur = auth()->id();
   
       // Créer un panier si nécessaire
       Panier::firstOrCreate([
           'idAcheteur' => $idAcheteur,
       ], [
           'total' => 0,
       ]);
   
       return view('acheteur.lot_acheteur', compact('prochaineCriee', 'criees', 'lot', 'prixMaxParLot', 'idAcheteur'));
   }
    
}
        

