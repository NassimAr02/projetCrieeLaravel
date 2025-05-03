<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class panierController extends Controller
{
    public function index()
    {
        return view('acheteur.panier');
    }
}
