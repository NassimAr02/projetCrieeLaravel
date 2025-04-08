<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AcheteurQueryController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

// Routes publiques
Route::get('/', function () { return view('welcome'); });
Route::get('/encheres', function () { return view('enchere_acheteur'); })->name('encheres');
Route::get('/acheteur', [AcheteurQueryController::class, 'index'])->name('acheteur_accueil');
Route::get('/mentionLegale', function () { return view('mentionLegale'); })->name('mentionLegale');
Route::get('/cgv', function () { return view('cgv'); })->name('cgv');

// Routes authentifiées (acheteurs)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes de connexion staff
Route::middleware('guest')->group(function () {
    Route::get('/staff/login', function () { return view('auth.login-staff'); })->name('staff.login');
    Route::post('/staff/login', [loginController::class, 'store'])->name('staff.login.submit');
});

// Déconnexion staff (modifiée pour gérer les deux types)
Route::post('/staff/logout', [loginController::class, 'logout'])
    ->middleware('staff.deco')
    ->name('staff.logout'); 
// Routes admin
Route::middleware(['staff.auth:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () { return view('admin.dashboard'); })->name('admin.dashboard');
    // Ajoutez d'autres routes admin ici
});

// Routes commissaire
Route::middleware(['staff.auth:commissaire'])->prefix('commissaire')->group(function () {
    Route::get('/dashboard', function () { return view('commissaire.dashboard'); })->name('commissaire.dashboard');
    // Ajoutez d'autres routes commissaire ici
});

require __DIR__.'/auth.php';