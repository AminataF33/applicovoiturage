<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vehicule;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;
use App\Models\Trajet;
use App\Models\Demande;
use App\Models\Avis;
use App\Models\Conducteur;
use App\Models\Utilisateur;



class ConducteurController extends Controller
{
    /**
     * Affiche le formulaire d'inscription conducteur
     */
    public function showRegistrationForm()
    {
        return view('auth.registerconducteur');
    }

    /**
     * Traite l'inscription d'un nouveau conducteur
     */

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
        'immatriculation' => 'required|string|max:10|unique:vehicules',

        // Champs du véhicule
        'marque' => 'required|string|max:100',
        'modele' => 'required|string|max:100',
        'couleur' => 'required|string|max:50',
        'nombre_places' => 'required|integer|min:1|max:8',
    ]);

    // Création de l'utilisateur
    $utilisateur = Utilisateur::create([
        'nom' => $validated['nom'],
        'prenom' => $validated['prenom'],
        'email' => $validated['email'],
        'telephone' => $validated['telephone'],
        'password' => bcrypt($validated['password']),
        'role' => 'conducteur',
    ]);

    // Création du conducteur
    Conducteur::create([
        'utilisateur_id' => $utilisateur->id,
        'adresse' => $validated['adresse'],
        'type_voiture' => $validated['type_voiture'],
        'immatriculation' => $validated['immatriculation'],
    ]);

    // Création du véhicule
    Vehicule::create([
        'marque' => $validated['marque'],
        'modele' => $validated['modele'],
        'immatriculation' => $validated['immatriculation'],
        'couleur' => $validated['couleur'],
        'nombre_places' => $validated['nombre_places'],
        'conducteur_id' => $utilisateur->id,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return redirect()->route('login')->with('success', 'Inscription réussie avec véhicule enregistré !');
}


    /**
     * Affiche le formulaire de connexion conducteur
     */
    public function showLoginForm()
    {
        return view('auth.login');
    } 

    /**
     * Traite la connexion d'un conducteur
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        // Tentative de connexion avec les identifiants fournis
        if (Auth::attempt([
            'email' => $credentials['email'],
            'password' => $credentials['password'], // C'est là que se trouve le problème
            'role' => 'conducteur'
        ], $request->filled('remember_me'))) {
            $request->session()->regenerate();

            return redirect()->intended(route('conducteur.dashboard'));
        }

        // Si la connexion échoue
        return back()->withErrors([
            'email' => 'Les identifiants fournis ne correspondent pas à nos enregistrements.',
        ])->withInput($request->except('password'));
    }

    /**
     * Déconnecte un conducteur
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('accueil');
    }

    /**
     * Affiche le tableau de bord du conducteur
     */
    public function dashboard()
    {
        if (Auth::user()->role !== 'conducteur') {
            return redirect()->route('accueil');
        }
    
        $user = Auth::user(); // ici $user est un modèle User
    
        $totalTrajets = Trajet::where('conducteur_id', $user->id)->count();
    
        $trajetsTermines = Trajet::where('conducteur_id', $user->id)
                                 ->where('statut', 'termine') // ou 'terminé'
                                 ->count();
        
        $trajetsAVenir = Trajet::where('conducteur_id', $user->id)
                                 ->where('date_depart', '>', now()) // Trajets dont la date de départ est dans le futur
                                 ->count();
        
        $demandesEnAttente = Trajet::where('conducteur_id', $user->id)
                                 ->where('statut', 'en_attente') // ou 'en attente'
                                 ->count();
       
        $prochainsTrajets = Trajet::where('conducteur_id', $user->id)
                                 ->where('date_depart', '>', now()) // ou 'date_depart' > Carbon::now()
                                 ->get(); // Récupère les objets trajets

        $demandes = Demande::where('conducteur_id', $user->id)
                                 ->get(); // Récupère toutes les demandes pour ce conducteur
              
        $avisRecents = Avis::with(['utilisateur', 'trajet'])->orderBy('created_at', 'desc')->take(5)
                                 ->get();
         
        return view('conducteur.dashboard', compact('totalTrajets', 'trajetsTermines', 'trajetsAVenir', 'demandesEnAttente', 'prochainsTrajets', 'demandes', 'avisRecents'));
                  
        }
    
    

    /**
     * Affiche la liste des trajets du conducteur
     */
    public function index()
    {
        $trajets = Trajet::where('conducteur_id', Auth::id())->get(); // Exemple
        return view('conducteur.trajets', compact('trajets'));
    }

    /**
     * Enregistre un trajet
     */



public function enregistrerTrajet(Request $request)
{
    $request->validate([
        'lieu_depart' => 'required|string|max:255',
        'destination' => 'required|string|max:255',
        'date' => 'required|date',
        'heure' => 'required',
        'places' => 'required|integer|min:1',
    ]);

    $trajet = new Trajet();
    $trajet->lieu_depart = $request->lieu_depart;
    $trajet->destination = $request->destination;
    $trajet->date = $request->date;
    $trajet->heure = $request->heure;
    $trajet->places = $request->places;
    $trajet->conducteur_id = Auth::id(); // Lier au conducteur connecté
    $trajet->save();

    return redirect()->route('conducteur.dashboard')->with('success', 'Trajet ajouté avec succès !');
}
public function formulaireAjout()
{
    return view('conducteur.ajoutertrajet');
}
public function ajoutertrajet(Request $request)
{
    // Extrait les données du formulaire
    $data = $request->validate([
        'ville_depart' => 'required|string|max:100',
        'ville_arrivee' => 'required|string|max:100',
        'adresse_depart' => 'nullable|string',
        'adresse_arrivee' => 'nullable|string',
        'date_depart' => 'required|date',
        'heure_depart' => 'required',
        'duree_estimee' => 'nullable|string',
        'distance_km' => 'nullable|numeric',
        'prix' => 'required|numeric',
        'nombre_places' => 'required|integer|min:1',
        'commentaire' => 'nullable|string',
        'options' => 'nullable|json',
        'vehicule_id' => 'required|exists:vehicules,id',
        // etc.
    ]);
    $data['options'] = $request->input('options', '{}');
    // Crée le trajet (ajuste avec le modèle approprié)
    $data['conducteur_id'] = Auth::user()->id;    
    \App\Models\Trajet::create($data);

    return redirect()->back()->with('success', 'Trajet ajouté avec succès');
}

public function showVehiculeSelect()
{
    $utilisateur = Auth::user();
    
    // Trouver d'abord le conducteur associé à cet utilisateur
    $conducteur = Conducteur::where('utilisateur_id', $utilisateur->id)->first();
    
    if ($conducteur) {
        // Récupérer les véhicules associés à ce conducteur
        $vehicules = Vehicule::where('conducteur_id', $conducteur->utilisateur_id)->get();
        
        // Si aucun véhicule n'est trouvé, créer automatiquement un véhicule
        if ($vehicules->isEmpty()) {
            $vehicule = Vehicule::create([
                'marque' => 'Auto-généré',
                'modele' => $conducteur->type_voiture ?? 'Non spécifié',
                'immatriculation' => $conducteur->immatriculation ?? 'TMP-' . rand(1000, 9999),
                'couleur' => 'Non spécifié',
                'nombre_places' => 4,
                'conducteur_id' => $conducteur->utilisateur_id,
            ]);
            
            // Rafraîchir la collection de véhicules
            $vehicules = collect([$vehicule]);
        }
    } else {
        // Si aucun conducteur n'est trouvé, renvoyer une collection vide
        $vehicules = collect([]);
    }
    
    return view('conducteur.trajets.create', compact('vehicules'));
}
}

