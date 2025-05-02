<?php
namespace App\Http\Controllers;

use App\Models\Utilisateur;
use App\Models\Conducteur;
use App\Models\Passager;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    // Affichage du formulaire conducteur
    public function formConducteur()
    {
       return view('inscription.conducteur');
    }

    // Affichage du formulaire passager
    public function formPassager()
    {
        return view('inscription.passager');
    }

    // Inscription du conducteur
    public function registerConducteur(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|email|unique:utilisateurs',
            'telephone' => 'required|unique:utilisateurs|max:15',
            'mot_de_passe' => 'required|min:8',
            'adresse' => 'required|string|max:255',
            'typeVoiture' => 'required|string|max:150',
            'immatriculation' => 'required|string|max:10',
        ]);

        $utilisateur = Utilisateur::create([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'telephone' => $validated['telephone'],
            'mot_de_passe' => bcrypt($validated['mot_de_passe']),
            'type_utilisateur' => 'Conducteur',
        ]);

        Conducteur::create([
            'Utilisateur_ID' => $utilisateur->ID,
            'adresse' => $validated['adresse'],
            'typeVoiture' => $validated['typeVoiture'],
            'immatriculation' => $validated['immatriculation'],
        ]);

        return redirect()->route('home')->with('success', 'Inscription réussie en tant que conducteur!');
    }

    // Inscription du passager
    public function registerPassager(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:100',
            'prenom' => 'required|string|max:100',
            'email' => 'required|email|unique:utilisateurs',
            'telephone' => 'required|unique:utilisateurs|max:15',
            'mot_de_passe' => 'required|min:8',
        ]);

        $utilisateur = Utilisateur::create([
            'nom' => $validated['nom'],
            'prenom' => $validated['prenom'],
            'email' => $validated['email'],
            'telephone' => $validated['telephone'],
            'mot_de_passe' => bcrypt($validated['mot_de_passe']),
            'type_utilisateur' => 'Passager',
        ]);

        Passager::create([
            'Utilisateur_ID' => $utilisateur->ID,
        ]);

        return redirect()->route('home')->with('success', 'Inscription réussie en tant que passager!');
    }
}
