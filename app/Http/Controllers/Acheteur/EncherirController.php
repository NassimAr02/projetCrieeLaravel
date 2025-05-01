<?php

namespace App\Http\Controllers\Acheteur;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Criee;
use App\Models\Lot;
use App\Models\Poster;
use Carbon\Carbon;

class EncherirController extends Controller
{
    //
    public function store(Request $request)
    {
        $validated = $request->validate([
            'idBateau' => 'required|exists:lot,idBateau',
            'datePeche' => 'required|exists:lot,datePeche',
            'idLot' => 'required|exists:lot,idLot',
            'idAcheteur' => 'required|exists:acheteur,idAcheteur',
            'prixEnchere' => 'required|numeric|min:0',
        ]);
    
        // Insertion dans la table enchere
        Poster::create([
            'idBateau' => $validated['idBateau'],
            'datePeche' => $validated['datePeche'],
            'idLot' => $validated['idLot'],
            'idAcheteur' => $validated['idAcheteur'],
            'prixEnchere' => $validated['prixEnchere'],
        ]);

        return back()->with('success', 'Enchère enregistrée.');
    }
}
