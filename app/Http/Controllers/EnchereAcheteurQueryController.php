<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lot;

class EnchereAcheteurQueryController extends Controller
{
    //
    public function index()
    {
        $encheres = Lot::all();
        return view('enchere_acheteur', compact('encheres'));
    }
}
