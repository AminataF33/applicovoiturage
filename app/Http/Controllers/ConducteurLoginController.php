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

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        $utilisateur = Utilisateur::where('email', $request->email)->first();
    
        if ($utilisateur && Hash::check($request->password, $utilisateur->mot_de_passe) && $utilisateur->conducteur) {
            Auth::login($utilisateur);
            return redirect('/dashboard-conducteur'); 
        }
    
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

