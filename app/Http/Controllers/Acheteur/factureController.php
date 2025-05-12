<?php

namespace App\Http\Controllers\Acheteur;

use App\Http\Controllers\Controller;
use App\Models\Panier;
use Illuminate\Http\Request;

class factureController extends Controller
{
    public function index()
    {
        $factures = Panier::with('lots.taille', 'lots.qualite', 'lots.espece')
            ->where('idAcheteur', auth()->id())
            ->where('estFacture', true)
            ->orderBy('dateFacture', 'desc')
            ->get();
        return view('acheteur.facture', compact('factures'));
    }
}
