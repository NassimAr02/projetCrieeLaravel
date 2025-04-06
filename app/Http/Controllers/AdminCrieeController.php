<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminCrieeController extends Controller
{
    public function showLoginForm() {
        return view('auth.admin-login');
    }

    public function login(Request $request) {
        $credentials = $request->validate([
            'User' => 'required',
            'Password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors(['User' => 'Identifiants incorrects']);
    }

    public function logout(Request $request) {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect('/admin/login');
    }
}
