<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () { return view('welcome'); });
// Route::get('/acheteur', function () { return view('acheteur_accueil'); });

use App\Http\Controllers\AcheteurQueryController;

Route::get('/acheteur', [AcheteurQueryController::class, 'index'])->name('acheteur_accueil');



// Route::get('/acheteurSQL', function () { 
//      $user = DB::select('select * from users');
// });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
