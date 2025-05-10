<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\Utilisateur;
use App\Models\Vehicule;
use App\Models\Trajet; // Si tu veux créer des instances de Trajet, il faut l'importer

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Ajout des seeders
        $this->call([
            UtilisateurSeeder::class,    
            VehiculeSeeder::class,       
            TrajetSeeder::class,         
        ]);
    }
}
