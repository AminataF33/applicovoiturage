<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Conducteur;
use App\Models\Passager;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function formConducteur()
    {
        return view('inscription.conducteur');
    }

    public function formPassager()
    {
        return view('inscription.passager');
    }

    public function registerConducteur(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|email|unique:utilisateur',
            'telephone' => 'required|unique:utilisateur|max:15',
            'password' => 'required|min:8',
            'adresse' => 'required|string|max:255',
            'type_voiture' => 'required|string|max:150',
            'immatriculation' => 'required|string|max:10',
        ]);

        $utilisateur = Utilisateur::create([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'telephone' => $validated['telephone'],
            'password' => bcrypt($validated['password']),
            'role' => 'conducteur', 
        ]);

        Conducteur::create([
            'utilisateur_id' => $utilisateur->id,
            'adresse' => $validated['adresse'],
            'type_voiture' => $validated['type_voiture'],
            'immatriculation' => $validated['immatriculation'],
        ]);

        return redirect()->route('login')->with('success', 'Inscription réussie en tant que conducteur! Veuillez-vous connecter!');
    }

    public function registerPassager(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|email|unique:utilisateur',
            'telephone' => 'required|unique:utilisateur|max:15',
            'password' => 'required|min:8',
        ]);

        $utilisateur = Utilisateur::create([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'telephone' => $validated['telephone'],
            'password' => bcrypt($validated['password']),
            'role' => 'passager',
        ]);

        Passager::create([
            'utilisateur_id' => $utilisateur->id,
        ]);

        return redirect()->route('login')->with('success', 'Inscription réussie en tant que passager! Veuillez-vous connecter!');
    }
}

