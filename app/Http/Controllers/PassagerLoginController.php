<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur; // Assurez-vous d'importer correctement le modèle Utilisateur
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PassagerLoginController extends Controller
{
    // Cette fonction retourne la vue pour le formulaire de connexion
    public function loginForm()
    {
        return view('auth.passagerlogin');
    }

    // Cette fonction gère l'authentification du passager
    public function login(Request $request)
    {
        // Validation des entrées de l'utilisateur
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Vérification des informations d'identification dans la base de données
        $utilisateur = Utilisateur::where('email', $request->email)->first();

        // Vérification si l'utilisateur existe et si le mot de passe est correct
        if ($utilisateur && Hash::check($request->password, $utilisateur->mot_de_passe)) {
            Auth::login($utilisateur); // Connexion de l'utilisateur
            return redirect('/dashboard-passager'); // Redirige vers le tableau de bord du passager
        }

        // Si la connexion échoue, retour avec un message d'erreur
        return back()->withErrors([
            'email' => 'Email ou mot de passe incorrect.',
        ]);
    }

    // Cette fonction gère la déconnexion de l'utilisateur
    public function logout()
    {
        Auth::logout(); // Déconnexion de l'utilisateur
        return redirect()->route('passager.login'); // Redirection vers la page de connexion
    }
}
