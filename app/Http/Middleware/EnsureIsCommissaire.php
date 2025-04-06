<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureIsCommissaire
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check() || !auth()->user()->isCommissaire()) {
            abort(403, 'Accès réservé aux commissaires');
        }
        return $next($request);
    }
}