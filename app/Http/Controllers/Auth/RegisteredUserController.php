<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Acheteur;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\Log; // Ajoutez cette ligne

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {


    \Log::info('Données reçues : ', $request->all());

    // Votre logique d'insertion

        $request->validate([
            'loginA' => ['required', 'string', 'max:255', 'unique:acheteur,loginA'],
            'emailA' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'telA' => ['required', 'string', 'max:255'],
            'pwd' => ['required', 'confirmed', Rules\Password::defaults()],
            'raisonSocialeEntreprise' => ['required', 'string', 'max:255'],
            'locRue' => ['required', 'string', 'max:255'],
            'rue' => ['required', 'string', 'max:255'],
            'ville' => ['required', 'string', 'max:255'],
            'cp' => ['required', 'string', 'max:255'],
            'numHabilitation' => ['required', 'string', 'max:255'],
        ]);

        $user = Acheteur::create([
            'loginA' => $request->loginA,
            'emailA' => $request->emailA,
            'telA' =>$request->telA,
            'pwd' => Hash::make($request->pwd),
            'raisonSocialeEntreprise' =>$request->raisonSocialeEntreprise,
            'locRue' =>$request->locRue,
            'rue' =>$request->rue,
            'ville' =>$request->ville,
            'cp' =>$request->cp,
            'numHabilitation' =>$request->numHabilitation,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('dashboard', absolute: false));
    }
}
