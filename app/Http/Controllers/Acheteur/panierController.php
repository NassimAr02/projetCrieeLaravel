<?php

namespace App\Http\Controllers\Acheteur;

use App\Http\Controllers\Controller;
use App\Models\Lot;
use Illuminate\Http\Request;
use App\Models\Panier;
use App\Models\Presentation;

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
        return view('acheteur.panier', compact('lotRemportes','id'));
    }


    public function reglerPanier(Request $req)
    {
         // Validation des données
        $req->validate([
            'libele' => 'required|string', // Vérifie que le champ libele est présent et valide
        ]);

        // Récupérer le panier de l'acheteur
        $panier = Panier::where('idAcheteur', auth()->id())
            ->where('estFacture', false)
            ->where('datePanier', now()->format('Y-m-d'))
            ->first();

        if ($panier) {
            $panier->estFacture = true;
            $panier->dateFacture = now();
            $panier->save();
        }

        // Récupérer le lot correspondant
        $lot = Lot::where('idBateau', $req->idBateau)
            ->where('datePeche', $req->datePeche)
            ->where('idLot', $req->idLot)
            ->where('idAcheteur', auth()->id())
            ->first();

        if (!$lot) {
            return back()->with('error', 'Le lot spécifié est introuvable.');
        }

        // Créer une présentation
        $presentation = Presentation::create([
            'idBac' => $lot->idBac,
            'idQualite' => $lot->idQualite,
            'idAcheteur' => auth()->id(),
            'libelle' => $req->libele,
        ]);

        // Mettre à jour le lot avec l'ID de la présentation
        Lot::where('idAcheteur', auth()->id())
            ->where('idPanier', $panier->idPanier ?? null)
            ->update(['idPresentation' => $presentation->idPresentation]);

        return redirect()->route('acheteur.factures')->with('success', 'Le panier a été réglé avec succès.');
    }
}
