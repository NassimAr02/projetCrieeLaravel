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

        $prochainLot = null;
        if ($panier) {
            $prochainLot = Lot::where('idAcheteur', $id)
                ->where('idPanier', $panier->idPanier)
                ->whereNull('idPresentation')
                ->first();
        }

        return view('acheteur.panier', compact('prochainLot', 'id'));
    }

    public function reglerPanier(Request $req)
    {
        $req->validate([
            'libele' => 'required|string',
        ]);

        $panier = Panier::where('idAcheteur', auth()->id())
            ->where('estFacture', false)
            ->where('datePanier', now()->format('Y-m-d'))
            ->first();

        if (!$panier) {
            return redirect()->route('acheteur.factures')->with('error', 'Aucun panier trouvé.');
        }

        $lot = Lot::where('idAcheteur', auth()->id())
            ->where('idPanier', $panier->idPanier)
            ->where('idBateau', $req->idBateau)
            ->where('datePeche', $req->datePeche)
            ->where('idLot', $req->idLot)
            ->first();

        if (!$lot) {
            return back()->with('error', 'Lot non trouvé.');
        }

        $presentation = Presentation::create([
            'idBac' => $lot->idBac,
            'idQualite' => $lot->idQualite,
            'idAcheteur' => auth()->id(),
            'libelle' => $req->libele,
        ]);

        // Mise à jour via requête Eloquent classique pour éviter le bug avec clé composite
        Lot::where('idAcheteur', $lot->idAcheteur)
            ->where('idPanier', $lot->idPanier)
            ->where('idBateau', $lot->idBateau)
            ->where('datePeche', $lot->datePeche)
            ->where('idLot', $lot->idLot)
            ->update([
                'idPresentation' => $presentation->idPresentation
            ]);

        // Vérifier s'il reste des lots sans présentation dans ce panier
        $autreLot = Lot::where('idAcheteur', auth()->id())
            ->where('idPanier', $panier->idPanier)
            ->whereNull('idPresentation')
            ->first();

        if ($autreLot) {
            return redirect()->route('acheteur.panier')->with('success', 'Présentation créée. Veuillez compléter la suivante.');
        } else {
            $panier->estFacture = true;
            $panier->dateFacture = now();
            $panier->save();
            return redirect()->route('acheteur.factures')->with('success', 'Le panier a été réglé avec succès.');
        }
    }

}
