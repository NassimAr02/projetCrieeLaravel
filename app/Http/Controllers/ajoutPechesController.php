<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bateau;

class ajoutPechesController extends Controller
{
    public function create()
    {
        $bateaux = Bateau::all();
        return view('admin.ajoutPeches', compact('bateaux'));
    }
    public function store()
    {
        
    }
}
