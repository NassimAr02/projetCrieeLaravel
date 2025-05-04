<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Criee;
use App\Models\Lot;
use App\Models\Poster;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
class lotCommissaireController extends Controller
{
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
           ->where('codeEtat','=','En attente')
           ->first();

        // On récupère les enchères max groupées par lot
        $prixMaxParLot = Poster::select('idLot', DB::raw('MAX(prixEnchere) as prix_max'))
        ->groupBy('idLot')
        ->pluck('prix_max', 'idLot'); // Associe idLot => prix_max

        


        return view('commissaire.lotCommissaire', compact('prochaineCriee', 'criees','lot', 'prixMaxParLot'));
    }
    public function gererEnchere()
    {

    }
}
