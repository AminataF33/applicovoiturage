<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class MigrateVehiculesConducteurs extends Migration
{
    /**
     * Run the migration.
     *
     * @return void
     */
    public function up()
    {
        // Récupérer tous les conducteurs
        $conducteurs = DB::table('conducteurs')->get();
        
        // Pour chaque conducteur, créer un véhicule correspondant
        foreach ($conducteurs as $conducteur) {
            DB::table('vehicules')->insert([
                'marque' => 'Auto-généré',
                'modele' => $conducteur->type_voiture,
                'immatriculation' => $conducteur->immatriculation,
                'couleur' => 'Non spécifié',
                'nombre_places' => 4, // valeur par défaut
                'conducteur_id' => $conducteur->utilisateur_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

    /**
     * Reverse the migration.
     *
     * @return void
     */
    public function down()
    {
        // Supprimer les véhicules créés automatiquement
        DB::table('vehicules')
            ->whereIn('conducteur_id', function($query) {
                $query->select('utilisateur_id')->from('conducteurs');
            })
            ->delete();
    }
}