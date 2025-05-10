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
   
       if ($lot) {
        // Récupérer le dernier prix enchéri pour le lot en vente
        $dernierPrix = Poster::where('idBateau', $lot->idBateau)
            ->where('datePeche', $lot->datePeche)
            ->where('idLot', $lot->idLot)
            ->orderBy('tempsEnregistrement', 'desc')
            ->value('prixEnchere');
    
        // Si aucun prix n'est trouvé, utilisez le prix de départ
        $lot->prixActuel = $dernierPrix ?? $lot->prixDepart;


   
       $idAcheteur = auth()->id();
   
    $panierEnCours = Panier::where('idAcheteur', $idAcheteur)
                    ->where('datePanier','=', $auj8)
                    ->first();
       if (!$panierEnCours) {
            Panier::create([
                'idAcheteur' => $idAcheteur,
                'total' => 0
            ]);
       return view('acheteur.lot_acheteur', compact('prochaineCriee', 'criees', 'lot',  'idAcheteur'));
   }
    
}
}
        

}