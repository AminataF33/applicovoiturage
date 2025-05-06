<?php

use App\Models\Conducteur;
use Illuminate\Database\Seeder;
use App\Models\User; // ou Conducteur si tu as un modèle séparé
use Illuminate\Support\Facades\Hash;

class ConducteurSeeder extends Seeder
{
    public function run(): void
    {
        $utilisateur = \App\Models\Utilisateur::create([
            'nom' => 'Fall',
            'prenom' => 'Aminata',
            'email' => 'aminatafall03@gmail.com',
            'password' => Hash::make('Aminata03'),
            'telephone' => '770161518',
            'role' => 'conducteur',
            'adresse' => 'Keur Massar',
        ]);
        
        Conducteur::create([
            'utilisateur_id' => $utilisateur->id,
            'type_voiture' => 'JEEP noire',
            'immatriculation' => 'DK-1234-AZ',
        ]);
        
    }
}
