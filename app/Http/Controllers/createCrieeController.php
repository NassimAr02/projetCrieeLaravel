<?php

namespace App\Http\Controllers;

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
            'heureDebut'=> 'required|time',
            'heureFin'=> 'required|time',
        ]); 
        Criee::create([
            'dateCriee'=> $req->dateCriee,
            'heureDebut'=> $req->heureDebut,
            'heureFin'=> $req->heureFin,
        ]);
    }
}
