<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RechercheController;
use App\Http\Controllers\ConducteurController;
use App\Http\Controllers\PassagerController;

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

// Connexion des conducteurs
Route::get('conducteurlogin', [ConducteurController::class, 'showForm'])->name('auth.loginconducteur'); // Formulaire de connexion
Route::post('conducteurlogin', [ConducteurController::class, 'login'])->name('conducteur.login'); // Traitement du formulaire de connexion

// Connexion des passagers
Route::get('login/passager', [PassagerController::class, 'showForm'])->name('auth.loginpassager');
Route::post('passagerlogin', [PassagerController::class, 'store'])->name('passager.store'); // Traitement du formulaire de connexion
Route::get('conducteurform', [ConducteurController::class, 'showForm'])->name('conducteur.form'); // Formulaire d'inscription
use App\Http\Controllers\InscriptionController;

Route::get('inscription/conducteur', [InscriptionController::class, 'formConducteur'])->name('register.conducteur');
Route::get('inscription/passager', [InscriptionController::class, 'formPassager'])->name('register.passager');

Route::post('inscription/conducteur', [InscriptionController::class, 'registerConducteur']);
Route::post('inscription/passager', [InscriptionController::class, 'registerPassager']);
