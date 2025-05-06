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
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utilisateur_id')->constrained('utilisateur')->onDelete('cascade');
            $table->string('modele');
            $table->string('immatriculation');
            $table->integer('annee')->nullable();
            $table->string('couleur')->nullable();
            $table->integer('nombre_places')->default(4);
            $table->string('type_carburant')->nullable();
            $table->string('photo')->nullable();
            $table->string('etat')->default('actif'); // actif ou inactif
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicules');
    }
}; 