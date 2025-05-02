<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur; // Utilisateur est ton modèle d'utilisateur (à ajuster si nécessaire)
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ConducteurLoginControllerr extends Controller
{
    // Afficher le formulaire de connexion pour les conducteurs
    public function loginForm()
    {
        return view('auth.conducteurlogin'); // La vue de connexion que tu vas créer dans resources/views/auth
    }

    // Gérer la connexion du conducteur
    public function login(Request $request)
    {
        // Validation des entrées
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Vérifier si l'utilisateur existe et est un conducteur
        $utilisateur = Utilisateur::where('email', $request->email)->first();

        // Si l'utilisateur existe et est un conducteur
        if ($utilisateur && Hash::check($request->password, $utilisateur->mot_de_passe) && $utilisateur->conducteur) {
            Auth::login($utilisateur);
            return redirect('/dashboard-conducteur'); // Remplace par la route ou la page de tableau de bord du conducteur
        }

        // Retourner une erreur si les informations sont incorrectes
        return back()->withErrors([
            'email' => 'Email, mot de passe ou rôle invalide.',
        ]);
    }

    // Déconnexion du conducteur
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.conducteur');
    }
}

