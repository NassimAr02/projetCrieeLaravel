<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class DetectUserType
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            // Basculer la connexion DB selon l'email
            if (str_contains($user->email, '@admin.criee')) {
                Config::set('database.default', 'mysql_admin');
            } elseif (str_contains($user->email, '@commissaire.criee')) {
                Config::set('database.default', 'mysql_commissaire');
            }
            
            DB::purge(config('database.default'));
            DB::reconnect(config('database.default'));
        }

        return $next($request);
    }
}