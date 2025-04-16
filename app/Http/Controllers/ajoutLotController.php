<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bac;
use App\Models\Taille;
use App\Models\Qualite;
use App\Models\Espece;
use App\Models\Criee;
use App\Models\Bateau;
use App\Models\Peche;
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

    }
}
