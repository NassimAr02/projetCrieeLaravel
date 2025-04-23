<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bateau;
class ajoutBateauController extends Controller
{
    public function create()
    {
        return view('admin.ajoutBateau');
    }
    public function store(Request $req)
    {
        $req->validate([
            'nomBateau' => 'required'
        ]);
        Bateau::create([
            'nomBateau'=>$req->nomBateau
        ]);
        return redirect()->route('admin.dashboard')->with('success', 'Bateau ajouté avec succès');
    }
}
