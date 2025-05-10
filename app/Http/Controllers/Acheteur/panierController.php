<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Lot;
use Illuminate\Http\Request;
use App\Models\Panier;
class panierController extends Controller
{
    public function index()
    {   
        $id = auth()->id();
        $panier = Panier::where('idAcheteur', $id)
            ->where('estFacture', false)
            ->where('datePanier', now()->format('Y-m-d'))
            ->first();
        $lotRemportes = Lot::where('idAcheteur', $id)
            ->where('idPanier', $panier->idPanier ?? null)
            ->get();
        return view('acheteur.panier', compact('lotRemportes'));
    }

    public function reglerPanier ()
    {
        $id = auth()->id();
        $panier = Panier::where('idAcheteur', $id)
            ->where('estFacture', false)
            ->where('datePanier', now()->format('Y-m-d'))
            ->first();

        if ($panier) {
            $panier->estFacture = true;
            $panier->dateFacture = now();
            $panier->save();
        }

        return redirect()->route('acheteur.facture')->with('success', 'Le panier a été réglé avec succès.');
    }
}
