<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Criee;
use Carbon\Carbon;
class CommissaireController extends Controller
{
    //
    public function index()
    {
        // Date actuelle
        $auj8 = Carbon::now('Europe/Paris')->format('Y-m-d');

        // Récupération de la criée à venir avec le nombre de lots
        $crieeJour = Criee::where('dateCriee','=', $auj8)
            ->withCount('lots') // Equivalent à un SELECT COUNT
            ->get();

        // Récupération de la criée à venir    
        $crieeAVenir = Criee::where('dateCriee', '>', $auj8)
            ->orderBy('dateCriee')
            ->withCount('lots')
            ->first();

        return view('commissaire.dashboard', compact('crieeJour', 'crieeAVenir'));
    }

    // public function pageVente($id)
    // {
    //     $criee = Criee::with('lots')->findOrFail($id);
    //     $premierLot = $criee->lots->first();
    // }
}
