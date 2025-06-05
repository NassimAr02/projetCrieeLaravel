<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginEvolution extends Controller
{
    public function index()
    {
        return view('accueilEvolution');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (auth()->guard('criee_evolution')->attempt($credentials)) {
            return redirect()->route('criee_evolution.dashboard');
        }

        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ]);
    }
    public function logout(Request $request)
    {
        // Déconnexion du guard criee_evolution
        auth()->guard('criee_evolution')->logout();

        // Nettoyage session
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->forget(['user_type', 'db_connection']);
        config(['database.default' => 'mysql']);

        // Retour à la page de connexion criee_evolution
        return redirect()->route('criee_evolution.login');
    }
}
