<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AcheteurQueryController;
use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;

// Routes publiques
Route::get('/', function () {
    return view('welcome');
});

Route::get('/mentionLegale', function () {
    return view('mentionLegale');
})->name('mentionLegale');

Route::get('/cgv', function () {
    return view('cgv');
})->name('cgv');

// Authentification Acheteur (Breeze standard)
require __DIR__.'/auth.php';

// Authentification Admin (MySQL)
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminAuthController::class, 'login']);
});

// Routes protégées Acheteur
Route::middleware(['auth:web'])->group(function () {
    Route::get('/acheteur', [AcheteurQueryController::class, 'index'])->name('acheteur.dashboard');
    
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes protégées Admin
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Routes protégées Commissaire
Route::middleware(['auth:commissaire'])->group(function () {
    Route::get('/commissaire/dashboard', function () {
        return view('commissaire.dashboard');
    })->name('commissaire.dashboard');
});