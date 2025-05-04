<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Criee;
use Carbon\Carbon;
class accueilAdminController extends Controller
{
    
   // Charge les criees avenir
   public function index() 
   {
        // 1. Utilisez startOfDay() pour inclure toute la journée actuelle
        $today = Carbon::now()->startOfDay();
        
        // 2. Modification des requêtes
        $prochaineCriee = Criee::where('dateCriee', '>=', $today)
                        ->orderBy('dateCriee')
                        ->orderBy('heureDebut')
                        ->first();
        
        $criees = Criee::where('dateCriee', '>=', $today)
                    ->orderBy('dateCriee')
                    ->orderBy('heureDebut')
                    ->get();

        // Formatage des dates (optionnel)
        if ($prochaineCriee) {
            $prochaineCriee->dateCriee = \Carbon\Carbon::parse($prochaineCriee->dateCriee);
        }

        return view('admin.dashboard', compact('prochaineCriee', 'criees'));
    }
        
}
