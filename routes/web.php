<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RechercheController;
use App\Http\Controllers\ConducteurController;
use App\Http\Controllers\PassagerController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\InscriptionController;

// Accueil de l'application
Route::get('/', function () {
    return view('welcome');
});

// Route pour la page d'accueil
Route::get('accueil', function () {
    return view('accueil');
})->name('accueil');

// Recherche de trajets
Route::get('recherche', [RechercheController::class, 'index'])->name('recherche.index');
Route::post('/recherche/trajets', [RechercheController::class, 'chercher'])->name('recherche.trajets');

// Conducteur
Route::get('/login/conducteur', [ConducteurController::class, 'showLoginForm'])->name('login.conducteur');
Route::post('/login/conducteur', [ConducteurController::class, 'login'])->name('conducteur.login');
Route::get('/conducteur/dashboard', [ConducteurController::class, 'dashboard'])->middleware('auth:conducteur');

// Passager
Route::get('/login/passager', [PassagerController::class, 'showLoginForm'])->name('login.passager');
Route::post('/login/passager', [PassagerController::class, 'login'])->name('passager.login');
Route::get('/passager/dashboard', [PassagerController::class, 'dashboard'])->middleware('auth:passager');

// Inscription des utilisateurs
Route::get('inscription/conducteur', [InscriptionController::class, 'formConducteur'])->name('register.conducteur');
Route::get('inscription/passager', [InscriptionController::class, 'formPassager'])->name('register.passager');

Route::post('inscription/conducteur', [InscriptionController::class, 'registerConducteur'])->name('conducteur.register');
Route::post('inscription/passager', [InscriptionController::class, 'registerPassager'])->name('passager.register');

// Dashboard des utilisateurs
Route::get('conducteur/dashboard', [ConducteurController::class, 'dashboard'])->name('conducteur.dashboard')->middleware('auth:conducteur');
Route::get('passager/dashboard', [PassagerController::class, 'dashboard'])->name('passager.dashboard')->middleware('auth:passager');

// Routes admin (commentées pour l'instant)
// Route::get('/login/admin', [AdminController::class, 'showLoginForm'])->name('login.admin');
// Route::post('/login/admin', [AdminController::class, 'login'])->name('admin.login');
// Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('auth:admin');

