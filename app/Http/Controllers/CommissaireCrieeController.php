<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommissaireCrieeController extends Controller
{
    public function showLoginForm() {
        return view('auth.commissaire-login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'User' => 'required',
            'Password' => 'required'
        ]);

        if (Auth::guard('commissaire')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/commissaire/dashboard');
        }

        return back()->withErrors(['User' => 'Identifiants incorrects']);
    }

    public function logout(Request $request) {
        Auth::guard('commissaire')->logout();
        $request->session()->invalidate();
        return redirect('/commissaire/login');
    }
}