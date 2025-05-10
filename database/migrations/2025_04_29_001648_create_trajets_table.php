<!-- 

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// class CreateTrajetsTable extends Migration
// {
//     public function up(): void
//     {
//         Schema::create('trajets', function (Blueprint $table) {
//             $table->id();
//             $table->string('lieu_depart', 100);
//             $table->string('lieu_destination', 100);
//             $table->dateTime('date_depart');
//             $table->dateTime('date_arrivee');
//             $table->enum('statut', ['Disponible', 'Complet', 'Annule']);
//             $table->decimal('prix', 8, 2);
//             $table->integer('places_disponibles');
//             $table->unsignedBigInteger('conducteur_id');
//             $table->foreign('conducteur_id')->references('utilisateur_id')->on('conducteurs')->onUpdate('cascade')->onDelete('restrict');
//             $table->timestamps();
//         });
//     }

//     public function down(): void
//     {
//         Schema::dropIfExists('trajets');
//     }
// } -->

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trajets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('conducteur_id')->constrained('utilisateur')->onDelete('cascade');
            $table->foreignId('vehicule_id')->constrained()->onDelete('cascade');
            $table->string('ville_depart');
            $table->string('ville_arrivee');
            $table->string('adresse_depart');
            $table->string('adresse_arrivee');
            $table->date('date_depart');
            $table->time('heure_depart');
            $table->integer('duree_estimee')->nullable(); // en minutes
            $table->integer('distance_km')->nullable();
            $table->decimal('prix', 8, 2);
            $table->integer('nombre_places');
            $table->integer('places_disponibles');
            $table->text('commentaire')->nullable();
            $table->json('options')->nullable();
            $table->string('statut')->default('planifié'); // planifié, en cours, terminé, annulé
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trajets');
    }
};