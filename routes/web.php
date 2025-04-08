<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AcheteurQueryController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\AdminCrieeController;
use App\Http\Controllers\CommissaireCrieeController;
Route::get('/', function () { return view('welcome'); });
Route::get('/accueil', function() { return view('welcome'); })->name('accueil');
Route::get('/encheres', function () { return view('enchere_acheteur'); })->name('encheres');



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
// Route::get('/acheteurSQL', function () { 
//      $user = DB::select('select * from users');
// });
// Routes Admin

Route::prefix('admin')->group(function() {
    Route::get('/login', [AdminCrieeController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminCrieeController::class, 'login']);
    Route::post('/logout', [AdminCrieeController::class, 'logout'])->name('admin.logout');
    
    Route::middleware('auth:admin')->group(function() {
        Route::get('/dashboard', function() {
            return view('admin.dashboard');
        })->name('admin.dashboard');
    });
});

// Routes Commissaire
Route::prefix('commissaire')->group(function() {
    Route::get('/login', [CommissaireCrieeController::class, 'showLoginForm'])->name('commissaire.login');
    Route::post('/login', [CommissaireCrieeController::class, 'login']);
    Route::post('/logout', [CommissaireCrieeController::class, 'logout'])->name('commissaire.logout');
    
    Route::middleware('auth:commissaire')->group(function() {
        Route::get('/dashboard', function() {
            return view('commissaire.dashboard');
        })->name('commissaire.dashboard');
    });
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
