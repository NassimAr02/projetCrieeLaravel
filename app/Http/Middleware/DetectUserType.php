<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;

class DetectUserType
{
    // app/Http/Middleware/DetectUserType.php
    public function handle($request, Closure $next)
    {
        if (auth()->guard('admin')->check()) {
            Config::set('database.default', 'mysql_admin');
        } 
        elseif (auth()->guard('commissaire')->check()) {
            Config::set('database.default', 'mysql_commissaire');
        }
        else {
            // Par défaut: connexion pour acheteurs
            Config::set('database.default', 'mysql');
        }

        DB::purge(config('database.default'));
        DB::reconnect(config('database.default'));

        return $next($request);
    }
}