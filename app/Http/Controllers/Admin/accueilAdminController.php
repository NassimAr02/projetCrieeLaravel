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
        // Obtenez la date et l'heure actuelles
        $maintenant = Carbon::now('Europe/Paris');

        // Récupérez la prochaine criée (future ou en cours)
        $prochaineCriee = Criee::whereRaw("CONCAT(dateCriee, ' ', heureDebut) >= ?", [$maintenant])
                        ->orderBy('dateCriee')
                        ->orderBy('heureDebut')
                        ->first();

        // Récupérez toutes les criées futures ou en cours
        $criees = Criee::whereRaw("CONCAT(dateCriee, ' ', heureDebut) >= ?", [$maintenant])
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
