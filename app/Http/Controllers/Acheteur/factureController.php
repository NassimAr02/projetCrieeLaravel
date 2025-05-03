<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class factureController extends Controller
{
    public function index()
    {
        return view('acheteur.facture');
    }
}
