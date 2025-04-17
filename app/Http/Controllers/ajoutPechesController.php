<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bateau;
use App\Models\Peche;
use App\Models\PecheCotiere;
use App\Models\PetitePeche;

class ajoutPechesController extends Controller
{
    public function create()
    {
        $bateaux = Bateau::all();
        return view('admin.ajoutPeches', compact('bateaux'));
    }
    public function store(Request $req)
    {
        $req ->validate([
            'nomBateau' => 'required',
            'datePeche' => 'required|date',
            'typePeche' => 'required'
        ]);
        $idBateau = Bateau::where('nomBateau', $req->nomBateau)->first()->idBateau;
        

        Peche::create([
            'datePeche' => $req -> datePeche,
            'idBateau' => $idBateau,
            'typePeche' => $req -> typePeche
        ]);
        if($req->typePeche == "cotiere"){
            PecheCotiere::create([
                'datePeche' => $req -> datePeche,
                'idBateau' => $idBateau
            ]);
        } else {
            PetitePeche::create([
                'datePeche' => $req -> datePeche,
                'idBateau' => $idBateau
            ]);
        }
        return redirect()->route('admin.dashboard')->with('success', 'Pêche ajoutée avec succès');
    }
}
