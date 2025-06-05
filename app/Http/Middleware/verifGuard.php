<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerifGuard
{
    public function handle(Request $request, Closure $next, string $guard)
    {
        if (!auth()->guard($guard)->check()) {
            // Redirige vers la page de login du guard
            return redirect()->route($guard . '.login')->with('error', 'Veuillez vous connecter');
        }
        return $next($request);
    }
}