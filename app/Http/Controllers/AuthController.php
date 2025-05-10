<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class AuthController extends Controller
{
    /**
     * Affiche le formulaire de connexion.
     */
    public function showLoginForm(Request $request)
    {
        $role = $request->query('role', 'passager'); // rôle par défaut
        return view('auth.login', ['role' => $role]);
    }

    /**
     * Traite la connexion de l'utilisateur.
     */
    public function login(Request $request)
{
    // Validation des champs
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
        'role' => 'required|in:conducteur,passager', // On valide aussi le rôle
    ]);

    // Recherche de l'utilisateur par son email
    $utilisateur = Utilisateur::where('email', $request->email)->first();

    // Vérifier si l'utilisateur existe et que le mot de passe est correct
    if (!$utilisateur || !Hash::check($request->password, $utilisateur->password)) {
        return back()->withErrors([
            'email' => 'Adresse email ou mot de passe incorrect.',
        ])->withInput();
    }

    // Vérification du rôle
    if ($utilisateur->role !== $request->role) {
        return back()->withErrors([
            'role' => 'Le rôle ne correspond pas à ce compte.',
        ])->withInput();
    }

    // Connexion de l'utilisateur
    Auth::login($utilisateur);

    // Redirection vers le tableau de bord approprié en fonction du rôle
    return redirect()->route($utilisateur->role . '.dashboard');
}

    /**
     * Déconnecte l'utilisateur.
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('accueil');
    }
}
