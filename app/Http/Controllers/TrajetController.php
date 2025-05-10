<?php

namespace App\Http\Controllers\Conducteur;

use App\Http\Controllers\Controller;
use App\Models\Trajet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TrajetController extends Controller
{
    /**
     * Affiche la liste des trajets du conducteur avec filtrage et pagination
     */
    public function index(Request $request)
    {
        $query = Trajet::where('conducteur_id', Auth::id());
        
        // Filtrage par statut
        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }
        
        // Filtrage par date de début
        if ($request->filled('date_debut')) {
            $query->whereDate('date_depart', '>=', $request->date_debut);
        }
        
        // Filtrage par date de fin
        if ($request->filled('date_fin')) {
            $query->whereDate('date_depart', '<=', $request->date_fin);
        }
        
        // Tri
        switch ($request->get('tri', 'date_desc')) {
            case 'date_asc':
                $query->orderBy('date_depart', 'asc');
                break;
            case 'prix_asc':
                $query->orderBy('prix', 'asc');
                break;
            case 'prix_desc':
                $query->orderBy('prix', 'desc');
                break;
            case 'date_desc':
            default:
                $query->orderBy('date_depart', 'desc');
                break;
        }
        
        $trajets = $query->paginate(10);
        
        return view('conducteur.trajets.index', compact('trajets'));
    }
    
    /**
     * Affiche le formulaire de création d'un trajet
     */
    public function create()
    {
        return view('conducteur.trajets.create');
    }
    
    /**
     * Enregistre un nouveau trajet dans la base de données
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'ville_depart' => 'required|string|max:255',
            'ville_arrivee' => 'required|string|max:255',
            'date_depart' => 'required|date|after:now',
            'places_disponibles' => 'required|integer|min:1|max:8',
            'prix' => 'required|numeric|min:0',
            'vehicule_id' => 'required|exists:vehicules,id',
            'description' => 'nullable|string',
            // Autres champs nécessaires
        ]);
        
        $trajet = new Trajet();
        $trajet->conducteur_id = Auth::id();
        $trajet->ville_depart = $validated['ville_depart'];
        $trajet->ville_arrivee = $validated['ville_arrivee'];
        $trajet->date_depart = $validated['date_depart'];
        $trajet->places_disponibles = $validated['places_disponibles'];
        $trajet->prix = $validated['prix'];
        $trajet->vehicule_id = $validated['vehicule_id'];
        $trajet->description = $validated['description'] ?? null;
        $trajet->statut = 'a_venir';
        $trajet->places_reservees = 0;
        $trajet->save();
        
        return redirect()->route('conducteur.trajets.show', $trajet->id)
            ->with('success', 'Votre trajet a été créé avec succès.');
    }
    
    /**
     * Affiche les détails d'un trajet spécifique
     */
    public function show($id)
    {
        $trajet = Trajet::where('conducteur_id', Auth::id())
            ->findOrFail($id);
        
        // Récupérer les réservations associées au trajet
        $reservations = $trajet->reservations()->with('passager')->get();
        
        // Récupérer les demandes en attente
        $demandesEnAttente = $trajet->demandesReservation()->where('statut', 'en_attente')->with('passager')->get();
        
        return view('conducteur.trajets.show', compact('trajet', 'reservations', 'demandesEnAttente'));
    }
    
    /**
     * Affiche le formulaire pour éditer un trajet
     */
    public function edit($id)
    {
        $trajet = Trajet::where('conducteur_id', Auth::id())
            ->findOrFail($id);
        
        // Vérifier si le trajet peut être modifié (seulement s'il est à venir)
        if ($trajet->statut !== 'a_venir') {
            return redirect()->route('conducteur.trajets.show', $trajet->id)
                ->with('error', 'Vous ne pouvez modifier que les trajets à venir.');
        }
        
        return view('conducteur.trajets.edit', compact('trajet'));
    }
    
    /**
     * Met à jour les informations d'un trajet
     */
    public function update(Request $request, $id)
    {
        $trajet = Trajet::where('conducteur_id', Auth::id())
            ->findOrFail($id);
        
        // Vérifier si le trajet peut être modifié
        if ($trajet->statut !== 'a_venir') {
            return redirect()->route('conducteur.trajets.show', $trajet->id)
                ->with('error', 'Vous ne pouvez modifier que les trajets à venir.');
        }
        
        $validated = $request->validate([
            'ville_depart' => 'required|string|max:255',
            'ville_arrivee' => 'required|string|max:255',
            'date_depart' => 'required|date|after:now',
            'places_disponibles' => 'required|integer|min:' . $trajet->places_reservees . '|max:8',
            'prix' => 'required|numeric|min:0',
            'vehicule_id' => 'required|exists:vehicules,id',
            'description' => 'nullable|string',
        ]);
        
            $request->validate([
            'vehicule_id' => 'required|exists:conducteurs,id',
        ]);
        
        $trajet->update($validated);
        
        return redirect()->route('conducteur.trajets.show', $trajet->id)
            ->with('success', 'Les informations du trajet ont été mises à jour.');
    } 
    

    /**
     * Annule un trajet
     */
    public function annuler($id)
    {
        $trajet = Trajet::where('conducteur_id', Auth::id())
            ->findOrFail($id);
        
        // Vérifier si le trajet peut être annulé
        if ($trajet->statut !== 'a_venir') {
            return redirect()->route('conducteur.trajets.show', $trajet->id)
                ->with('error', 'Vous ne pouvez annuler que les trajets à venir.');
        }
        
        $trajet->statut = 'annule';
        $trajet->save();
        
        // Notifier les passagers de l'annulation
        // Code pour envoyer des notifications...
        
        return redirect()->route('conducteur.trajets')
            ->with('success', 'Le trajet a été annulé.');
    }
    
    /**
     * Démarre un trajet
     */
    public function demarrer($id)
    {
        $trajet = Trajet::where('conducteur_id', Auth::id())
            ->findOrFail($id);
        
        // Vérifier si le trajet peut être démarré
        if ($trajet->statut !== 'a_venir') {
            return redirect()->route('conducteur.trajets.show', $trajet->id)
                ->with('error', 'Vous ne pouvez démarrer que les trajets à venir.');
        }
        
        $trajet->statut = 'en_cours';
        $trajet->save();
        
        return redirect()->route('conducteur.trajets.show', $trajet->id)
            ->with('success', 'Le trajet a été démarré.');
    }
    
    /**
     * Termine un trajet
     */
    public function terminer($id)
    {
        $trajet = Trajet::where('conducteur_id', Auth::id())
            ->findOrFail($id);
        
        // Vérifier si le trajet peut être terminé
        if ($trajet->statut !== 'en_cours') {
            return redirect()->route('conducteur.trajets.show', $trajet->id)
                ->with('error', 'Vous ne pouvez terminer que les trajets en cours.');
        }
        
        $trajet->statut = 'termine';
        $trajet->save();
        
        return redirect()->route('conducteur.trajets.show', $trajet->id)
            ->with('success', 'Le trajet a été marqué comme terminé.');
    }
}
