<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Utilisateur; // Assure-toi que ce modèle existe
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        // Validation des données reçues
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Recherche de l'utilisateur par email
        $user = Utilisateur::where('email', $request->email)->first();

        // Vérification si l'utilisateur existe
        if (!$user) {
            return response()->json([
                'message' => 'Adresse email incorrecte ou utilisateur introuvable.'
            ], 404);
        }

        // Vérification du mot de passe
        if (!Hash::check($request->password, $user->mot_de_passe)) {
            return response()->json([
                'message' => 'Mot de passe incorrect.'
            ], 401);
        }

        // Connexion réussie : tu peux générer un token ici si tu utilises Laravel Sanctum ou Passport
        return response()->json([
            'message' => 'Connexion réussie.',
            'user_id' => $user->id,
            'user_role' => $user->role ?? 'passager' // s'il y a un champ role
        ], 200);
    }

        /**
     * Déconnecte l'utilisateur
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('accueil');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

}
