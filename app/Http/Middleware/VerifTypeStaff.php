<?php



namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifTypeStaff
{
    public function handle(Request $request, Closure $next, string $type)
    {
        // Vérifie si l'utilisateur est connecté en tant que staff
        if (!session()->has('user_type')) {
            return redirect()->route('staff.login')->with('error', 'Veuillez vous connecter');
        }

        // Vérifie le type d'utilisateur
        if (session('user_type') !== $type) {
            abort(403, "Accès réservé aux {$type}s");
        }

        return $next($request);
    }
}
