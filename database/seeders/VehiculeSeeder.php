<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicule;

class VehiculeSeeder extends Seeder
{
    public function run()
    {
        Vehicule::create([
            'conducteur_id' => 1,
            'marque' => 'Mercedes',
            'modele' => 'Benz',
            //'annee' => 2021,
            'couleur' => 'Gris',
            'immatriculation' => 'DK-9901-AA',
            'nombre_places' => 5,
            'options' => json_encode(['climatisation' => true, 'radio' => true])
        ]);
    }
}
