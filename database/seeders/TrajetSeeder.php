<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Trajet;

class TrajetSeeder extends Seeder
{
    public function run()
    {
        Trajet::create([
            'conducteur_id' => 1,
            'vehicule_id' => 1,
            'ville_depart' => 'Dakar',
            'ville_arrivee' => 'Dakar',
            'adresse_depart' => 'Almadies 2',
            'adresse_arrivee' => 'Universite Cheikh Anta Diop',
            'date_depart' => '2025-05-15',
            'heure_depart' => '08:00',
            'duree_estimee' => '30 minutes',
            //'distance_km' => 70,
            'prix' => 2500,
            'nombre_places' => 4,
            'places_disponibles' => 4,
            'commentaire' => 'Départ à l’heure, bagages acceptés.',
            'options' => json_encode(['climatisation' => true, 'animaux_autorises' => false]),
            //'statut' => 'planifié',
        ]);
    }
}
