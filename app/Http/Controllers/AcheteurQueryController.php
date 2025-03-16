<?php

namespace App\Http\Controllers;

use App\Models\Acheteur;
use Illuminate\Http\Request;

class AcheteurQueryController extends Controller
{
    public function index()
    {
        $acheteurs = Acheteur::all();
        return view('acheteur_accueil', compact('acheteurs'));
    }
}
