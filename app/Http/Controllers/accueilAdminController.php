<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Criee;
use Carbon\Carbon;
class accueilAdminController extends Controller
{
    
   // Charge les criees avenir
    public function index() {
        return view('admin.dashboard', [
            'prochaineCriee' => Criee::where('dateCriee', '>', now())
                                ->orderBy('dateCriee')
                                ->first(),
            'criees' => Criee::where('dateCriee', '>', now())
                        ->orderBy('dateCriee')
                        ->get()
        ]);
    }
        
}
