<?php
namespace App\Http\Controllers\Acheteur;

use Illuminate\Http\Request;
use App\Models\Lot;
use App\Models\Panier;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use App\Http\Controllers\Controller;
class TelechargerController extends Controller
{
    public function telechargerFacture($panier)
    {
        // Récupérer les informations du panier et des lots
        $panier = Panier::with('lots')->findOrFail($panier);

        // Générer le PDF
        $pdf = PDF::loadView('acheteur.facture_pdf', compact('panier'));

        // Télécharger le fichier PDF
        return $pdf->download('facture_panier_' . $panier . '.pdf');
    }
}