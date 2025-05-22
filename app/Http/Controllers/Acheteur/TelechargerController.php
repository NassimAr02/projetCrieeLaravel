<?php
namespace App\Http\Controllers\Acheteur;

use Illuminate\Http\Request;
use App\Models\Lot;
use App\Models\Panier;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Http\Controllers\Controller;
use App\Models\Acheteur;

class TelechargerController extends Controller
{
    public function telechargerFacture($panier)
    {
        // Récupérer les informations du panier et des lots
        $facture = Panier::with('lots')->findOrFail($panier);

        // Générer le PDF
        
        $acheteur = $facture->idAcheteur;
        $infoA = Acheteur::findOrFail($acheteur);
        // Télécharger le fichier PDF
        return view('acheteur.facture_PDF', compact('facture','infoA'));
    }
}