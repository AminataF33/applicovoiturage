<?php

namespace App\Http\Controllers;

use App\Models\Conducteur;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ConducteurController extends Controller
{
    // Afficher le formulaire d'inscription pour les conducteurs
    public function showForm()
    {
        return view('auth.loginconducteur');
    }

    // Enregistrer un conducteur (lors de l'inscription)
    public function store(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:utilisateurs',
            'password' => 'required|string|min:6',
            'type_voiture' => 'required|string',
            'immatriculation' => 'required|string',
        ]);

        // Créer l'utilisateur (utilisateur générique)
        $utilisateur = Utilisateur::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Créer le conducteur (conducteur spécifique)
        Conducteur::create([
            'utilisateur_id' => $utilisateur->id,
            'type_voiture' => $request->type_voiture,
            'immatriculation' => $request->immatriculation,
        ]);

        // Connecter l'utilisateur et rediriger vers la page de connexion ou accueil
        Auth::login($utilisateur);  // Optionnel : si tu veux connecter l'utilisateur immédiatement
        return redirect()->route('accueil');  // Rediriger vers la page d'accueil après l'inscription
    }

    // Afficher le formulaire de connexion pour les conducteurs
    public function showLoginForm()
    {
        return view('auth.login-conducteur');
    }

    // Authentifier le conducteur
    public function login(Request $request)
    {
        // Validation des données
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Tentative d'authentification
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('accueil'); // Rediriger vers l'accueil après connexion
        }

        // Si l'authentification échoue
        return back()->withErrors(['email' => 'Email ou mot de passe incorrect.']);
    }
}
