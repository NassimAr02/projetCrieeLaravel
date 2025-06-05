<?php

namespace App\Http\Controllers;

use App\Models\userEvolution;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class registerEvolution extends Controller
{
    public function index()
    {
        return view('registerEvolution');
    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'nomUser' => 'required|string|max:255',
            'prenomUser' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'pwd' => 'required|string|min:8|confirmed',
        ]);


     
        $userEvolution = userEvolution::create([
            'nomUser' => $request->input('nomUser'),
            'prenomUser' => $request->input('prenomUser'),
            'email' => $request->input('email'),
            'mdpUser' => bcrypt($request->input('pwd')), // Hash the password
        ]);
        event(new Registered($userEvolution));

        Auth::guard('criee_evolution')->login($userEvolution);


        return redirect()->route('criee_evolution.dashboard')->with('success', 'Inscription réussie !');

    }
}
