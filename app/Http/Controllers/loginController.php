<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $username = $request->input('username');
        $password = $request->input('password');
        
        if ($username === 'admin_criee' && $password === 'admin2024'){
            config (['database.default'=>'admin_criee']);
            session(['user_type' =>'admin']);
            return redirect()->route('admin.dashboard');
        }
        elseif ($username === 'commissaire_criee' && $password === 'commissaire2024') {
            // Changer la connexion pour utiliser l'utilisateur commissaire_criee
            config(['database.default' => 'commissaire_criee']);
            session(['user_type' => 'commissaire']);
            return redirect()->route('commissaire.dashboard');
        }
        return back()->withErrors([
            'username' => 'Identifiants ou mots de passes incorrects .',
            'password' => 'Identifiants ou mots de passes incorrects .'
        ]);
    }
    public function logout(Request $request)
    {
        // Sauvegardez le type avant de tout effacer
        $userType = session('user_type');
        
        // Nettoyage de la session
        $request->session()->forget(['user_type', 'db_connection']);
        config(['database.default' => 'mysql']);
        
        // Redirection appropriée
        return redirect()->route($userType ? 'staff.login' : 'login');
    }
}