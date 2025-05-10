<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RechercheController;
use App\Http\Controllers\ConducteurController;
use App\Http\Controllers\PassagerController;
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

use App\Http\Controllers\AuthController;
use App\Models\Conducteur;

// Authentification unifiée
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Dashboards (protégés par auth)
Route::get('conducteur/dashboard', [ConducteurController::class, 'dashboard'])->name('conducteur.dashboard')->middleware('auth');
Route::get('passager/dashboard', [PassagerController::class, 'dashboard'])->name('passager.dashboard')->middleware('auth');

// Inscription des utilisateurs
Route::get('inscription/conducteur', [InscriptionController::class, 'formConducteur'])->name('register.conducteur');
Route::get('inscription/passager', [InscriptionController::class, 'formPassager'])->name('register.passager');

Route::post('inscription/conducteur', [InscriptionController::class, 'registerConducteur'])->name('conducteur.register');
Route::post('inscription/passager', [InscriptionController::class, 'registerPassager'])->name('passager.register');

// // Dashboard des utilisateurs
// Route::get('conducteur/dashboard', [ConducteurController::class, 'dashboard'])->name('conducteur.dashboard')->middleware('auth:conducteur');
// Route::get('passager/dashboard', [PassagerController::class, 'dashboard'])->name('passager.dashboard')->middleware('auth:passager');

// routes/web.php



// Routes admin (commentées pour l'instant)
// Route::get('/login/admin', [AdminController::class, 'showLoginForm'])->name('login.admin');
// Route::post('/login/admin', [AdminController::class, 'login'])->name('admin.login');
// Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->middleware('auth:admin');


Route::get('/check-db', function () {
    return DB::connection()->getDatabaseName();
});


Route::get('conducteur/trajets', [ConducteurController::class, 'trajets'])->name('conducteur.trajets')->middleware('auth');
//Route::get('conducteur/trajets/create', [ConducteurController::class, 'createTrajet'])->name('conducteur.trajets.create')->middleware('auth');

Route::get('conducteur/trajets/ajouter', [ConducteurController::class, 'formulaireAjout'])->name('conducteur.trajets.form');

Route::post('conducteur/trajets/ajouter', [ConducteurController::class, 'ajoutertrajet'])->name('conducteur.trajets.create');
