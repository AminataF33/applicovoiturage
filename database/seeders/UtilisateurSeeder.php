<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Utilisateur; // Assure-toi d'importer le modèle Utilisateur
use Illuminate\Support\Facades\Hash;

class UtilisateurSeeder extends Seeder
{
    public function run()
    {
        Utilisateur::create([
            'nom' => 'Fall',
            'prenom' => 'Fatoumata',
            'email' => 'fatoufall@gmail.com',
            'telephone' => '770161518',
            'password' => Hash::make('Fatoumata03'), 
            'role' => 'conducteur', 
        ]);
    }
}
