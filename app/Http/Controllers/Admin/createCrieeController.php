<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Criee;
class createCrieeController extends Controller
{
    public function index(){
        return view('admin.createCriee',[
            
        ]);  
    }
    public function store(Request $req){
        
        $req->validate([
            'dateCriee'=> 'required|date',
            'heureDebut' => 'required|date_format:H:i',  // Format heure:minute
            'heureFin' => 'required|date_format:H:i|after:heureDebut',
        ]); 
        Criee::create([
            'dateCriee'=> $req->dateCriee,
            'heureDebut'=> $req->heureDebut,
            'heureFin'=> $req->heureFin,
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Criee ajoutée avec succès');
    }
}
