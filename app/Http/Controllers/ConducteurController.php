<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conducteur;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ConducteurController extends Controller
{
    /**
     * Affiche le formulaire d'inscription conducteur
     */
    public function showRegistrationForm()
    {
        return view('inscription_conducteur');
    }
    /**
     * Enregistre un nouveau conducteur
     */
    public function register(Request $request)
    {
        // Validation des données du formulaire
        $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'telephone' => 'required|string|max:20',
            'adresse' => 'required|string|max:255',
            'password' => 'required|string|min:8',
            'typeVoiture' => 'required|string|max:255',
            'immatriculation' => 'required|string|max:20',
        ]);

        // Création de l'utilisateur
        $user = User::create([
            'prenom' => $request->prenom,
            'nom' => $request->nom,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'conducteur',
        ]);

        // Création du conducteur
        Conducteur::create([
            'utilisateur_id' => $user->id,
            'telephone' => $request->telephone,
            'adresse' => $request->adresse,
            'type_voiture' => $request->typeVoiture,
            'immatriculation' => $request->immatriculation,
        ]);

        // Message de succès
        return redirect()->route('login.conducteur')->with('success', 'Votre compte conducteur a été créé avec succès. Veuillez vous connecter.');
    }

    /**
     * Affiche le dashboard du conducteur
     */
    public function dashboard()
    {
        if (!Auth::check() || Auth::user()->role !== 'conducteur') {
            return redirect()->route('login.conducteur')->with('error', 'Veuillez vous connecter en tant que conducteur pour accéder à cette page.');
        }
        
        $conducteur = Conducteur::where('utilisateur_id', Auth::id())->first();
        
        return view('conducteur.dashboard', ['conducteur' => $conducteur]);
    }    
        public function showLoginForm()
    {
        return view('auth.loginconducteur');
    }


}