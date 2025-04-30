<?php

namespace App\Http\Controllers\Acheteur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Criee;
use App\Models\Lot;
use Carbon\Carbon;
class LotAcheteurController extends Controller
{
    
   // Charge les criees avenir
    public function index() {
        $prochaineCriee = Criee::where('dateCriee', '>=', Carbon::now())
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
           ->where('idCriee', $prochaineCriee->idCriee)
           ->first();

        $idAcheteur = auth()->id(); 


        return view('acheteur.lot_acheteur', compact('prochaineCriee', 'criees','lot','idAcheteur'));
    }
    public function store(){
        
    }
        
}
