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

    // Récupérer la prochaine criée
    $prochaineCriee = Criee::where('dateCriee', '>=', $auj8)
                    ->orderBy('dateCriee')
                    ->first();

    if (!$prochaineCriee) {
        return back()->with('error', 'Aucune criée disponible.');
    }

    $prochaineCriee->dateCriee = \Carbon\Carbon::parse($prochaineCriee->dateCriee);

    // Récupérer les criées futures
    $criees = Criee::where('dateCriee', '>=', Carbon::now())
                ->orderBy('dateCriee')
                ->get();

    // Récupérer le lot en vente
    $lot = Lot::with(['qualite', 'espece', 'taille'])
        ->where('idCriee', $prochaineCriee->idCriee)
        ->first();

    if (!$lot) {
        return back()->with('error', 'Aucun lot disponible pour cette criée.');
    }

    if ($lot->codeEtat !== 'En vente') {
        return back()->with('error', 'Le lot sélectionné n\'est pas encore disponible pour enchérir.');
    }

    // Récupérer le dernier prix enchéri pour le lot
    $dernierPrix = Poster::where('idBateau', $lot->idBateau)
        ->where('datePeche', $lot->datePeche)
        ->where('idLot', $lot->idLot)
        ->orderBy('tempsEnregistrement', 'desc')
        ->value('prixEnchere');

    // Si aucun prix n'est trouvé, utilisez le prix de départ
    $lot->prixActuel = $dernierPrix ?? $lot->prixDepart;

    // Récupérer ou créer un panier pour l'acheteur
    $idAcheteur = auth()->id();

    $panierEnCours = Panier::where('idAcheteur', $idAcheteur)
        ->whereDate('datePanier', $auj8) // Utilisation de whereDate pour comparer uniquement la date
        ->first();

    if (!$panierEnCours) {
        $panierEnCours = Panier::create([
            'idAcheteur' => $idAcheteur,
            'datePanier' => $auj8,
            'total' => 0,
        ]);
    }
    // Retourner la vue avec les données
    return view('acheteur.lot_acheteur', compact('prochaineCriee', 'criees', 'lot', 'idAcheteur'));
}
}