<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Criee;
use Carbon\Carbon;
class accueilAdminController extends Controller
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

        return view('admin.dashboard', compact('prochaineCriee', 'criees'));
    }
        
}
