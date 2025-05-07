<?php

namespace App\Http\Controllers\Acheteur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Criee;
use App\Models\Lot;
use Carbon\Carbon;
class AccueilAcheteurController extends Controller
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
        
        // $lot = Lot::where('idCriee',$prochaineCriee -> idCriee)
        //             ->get();'lot'

        return view('acheteur.dashboard', compact('prochaineCriee', 'criees'));
    }
        
}
