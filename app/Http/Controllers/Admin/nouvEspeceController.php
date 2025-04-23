<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Espece;
class nouvEspeceController extends Controller
{
    public function create()
    {
        return view('admin.ajoutEspece');
    }

    public function store(Request $req)
    {
        $espece = Espece::where('nomEspece',$req->nomEspece)->first();

        if(!$espece){
            Espece::create([
                'nomEspece' => $req->nomEspece,
                'nomScientifiqueEspece' => $req->nomScientifiqueEspece, 
                'nomCommunEspece'=>$req->nomCommunEspece
            ]);
            return redirect()->route('admin.dashboard')->with('success', 'Espèce ajoutée avec succès');
        } else {
            return redirect()->route('admin.dashboard')->with('error', 'L\'espèce existe déjà');
        }
        
    }
}