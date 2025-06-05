<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AcheteurQueryController;
use App\Http\Controllers\CommissaireController;
use App\Http\Controllers\loginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Admin\AccueilAdminController;
use App\Http\Controllers\Admin\ajoutBateauController;
use App\Http\Controllers\Admin\ajoutLotController;
use App\Http\Controllers\Admin\createCrieeController;     
use App\Http\Controllers\Admin\ajoutPechesController;
use App\Http\Controllers\EnchereAcheteurQueryController;
use App\Http\Controllers\Admin\nouvEspeceController;

//Controllers Acheteurs
use App\Http\Controllers\Acheteur\AccueilAcheteurController;
use App\Http\Controllers\Acheteur\LotAcheteurController;
use App\Http\Controllers\lotCommissaire;
use App\Http\Controllers\Acheteur\EncherirController;
use App\Http\Controllers\Acheteur\FactureController;
use App\Http\Controllers\lotCommissaireController;
use App\Http\Controllers\Acheteur\panierController;
use App\Http\Controllers\Acheteur\TelechargerController;
use App\Http\Controllers\loginEvolution;
use App\Http\Controllers\registerEvolution;
// Routes publiques
Route::get('/', function () { return view('welcome'); });
Route::get('/accueil', function() { return view('welcome'); })->name('accueil');


Route::get('/mentionLegale', function () { return view('mentionLegale'); })->name('mentionLegale');
Route::get('/cgv', function () { return view('cgv'); })->name('cgv');

// Routes authentifiées (acheteurs)
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [AccueilAcheteurController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes de connexion staff
Route::middleware('guest')->group(function () {
    Route::get('/staff/login', function () { return view('auth.login-staff'); })->name('staff.login');
    Route::get('/criee_evolution/register', [registerEvolution::class, 'index'])->name('criee_evolution.register');
    Route::post('/criee_evolution/register', [registerEvolution::class, 'store'])->name('criee_evolution.register.submit');
    Route::post('/staff/login', [loginController::class, 'store'])->name('staff.login.submit');
});

// Déconnexion staff (modifiée pour gérer les deux types)
Route::post('/staff/logout', [loginController::class, 'logout'])
    ->middleware('staff.deco')
    ->name('staff.logout'); 


    
// Routes acheteur

Route::get('/encheres', [AccueilAcheteurController::class, 'index'])->name('acheteur.enchere_acheteur');
Route::get('/lots', [LotAcheteurController::class, 'index'])->name('acheteur.lot_acheteur');
// Route::post('/lots',[LotAcheteurController::class, 'store'])->name('acheteur.encherir.store');
Route::post('/encherir', [EncherirController::class, 'store'])->name('encherir.store');
Route::get('/facture',[FactureController::class, 'index'])->name('acheteur.factures');
Route::get('/panier',[panierController::class, 'index'])->name('acheteur.panier');
Route::post('/panier',[panierController::class, 'reglerPanier'])->name('acheteur.reglerPanier');
Route::get('/facture/{panier}', [TelechargerController::class, 'telechargerFacture'])->name('facture.telecharger');
// Routes admin
Route::middleware(['staff.auth:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AccueilAdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/createCriee',[CreateCrieeController::class, 'index'])->name('admin.createCriee');
    Route::post('/createCriee',[CreateCrieeController::class, 'store'])->name('admin.createCriee.store');
    // GET pour afficher le formulaire
    Route::get('/ajoutLot/{criee}', [ajoutLotController::class, 'create'])
         ->name('admin.ajoutLot.create');
         
    // POST pour traiter le formulaire
    Route::post('/ajoutLot/{criee}', [ajoutLotController::class, 'store'])
         ->name('admin.ajoutLot.store');
    Route::get('/ajoutBateau',[ajoutBateauController::class, 'create'])->name('admin.bateau');
    Route::post('/ajoutBateau',[ajoutBateauController::class, 'store'])->name('admin.bateau.store');
    Route::get('/ajoutPeches',[ajoutPechesController::class, 'create'])->name('admin.ajoutPeches');
    Route::post('/ajoutPeches',[ajoutPechesController::class, 'store'])->name('admin.ajoutPeches.store');
    Route::get('/ajoutEspece',[nouvEspeceController ::class, 'create'])->name('admin.ajoutEspece');
    Route::post('/ajoutEspece',[nouvEspeceController ::class, 'store'])->name('admin.ajoutEspece.store');
});

// Routes commissaire
Route::middleware(['staff.auth:commissaire'])->prefix('commissaire')->group(function () {
    Route::get('/dashboard', [CommissaireController::class, 'index'])
        ->name('commissaire.dashboard');
    Route::get('/commissaire/debuter-vente/{criee}', [lotCommissaireController::class, 'index'])->name('commissaire.debuterVente');
    Route::post('/lancerVente',[lotCommissaireController::class,'debutEnchere'])->name('commissaire.debutEnchere');
    Route::post('/descendante',[lotCommissaireController::class,'enchereDescendante'])->name('commissaire.Descendante');
    Route::post('/commissaire/cloturer-lot', [lotCommissaireController::class, 'finEnchere'])->name('commissaire.cloturerLot');
    // Route::get('/vente', [CommissaireController::class, 'index'])
    //      ->name('commissaire.vente.index');
    // Ajoutez d'autres routes commissaire ici
});
// Formulaire de login (GET)
Route::middleware('guest')->get('/criee_evolution/login', function () {
    return view('loginEvolution');
})->name('criee_evolution.login');

// Soumission du login (POST) + dashboard (GET) protégés par middleware
Route::prefix('criee_evolution')->group(function () {
    Route::post('/login', [loginEvolution::class, 'login'])->name('criee_evolution.login.submit');
    Route::middleware('verifguard:criee_evolution')->get('/dashboard', [loginEvolution::class, 'index'])->name('criee_evolution.dashboard');
    Route::post('/logout', [loginEvolution::class, 'logout'])->name('criee_evolution.logout');
});
require __DIR__.'/auth.php';