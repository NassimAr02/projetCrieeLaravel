<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bac;
use App\Models\Taille;
use App\Models\Qualite;
use App\Models\Espece;
use App\Models\Criee;
use App\Models\Bateau;
use App\Models\Peche;
use App\Models\Lot;
class ajoutLotController extends Controller
{
    public function create($criee)
    {
        // Récupérer la criée spécifique
        $criee = Criee::findOrFail($criee);
        
        $bacs = Bac::all();
        $tailles = Taille::all();
        $qualites = Qualite::all();
        $especes =Espece::all(); 
        $bateaux = Bateau::all();
        $peches = Peche::with('bateau')->get(); 
        return view('admin.ajoutLot', compact('bacs','tailles','qualites','especes','criee','bateaux','peches'));
    }
    public function store(Request $req, $criee)
    {
        $idLot = Lot::max('idLot');
        $idLot +=1;        
        Lot::create([
            'idBateau' => $req->idBateau,
            'datePeche' => $req->peches,
            'idLot' => $idLot,
            'poidsBrutLot' => $req->poidBrut,
            'prixPlancher'=> $req->prixPlancher,
            'prixDepart' => $req->prixDepart,
            'idTaille' => $req->tailles,
            'idBac' => $req->bacs,
            'idQualite' => $req->qualites,
            'idEspece' => $req->idEspece,
            'idCriee' => $criee
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Lot ajouté avec succès');
    }
}
