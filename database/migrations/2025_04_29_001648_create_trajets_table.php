<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrajetsTable extends Migration
{
    public function up(): void
    {
        Schema::create('trajets', function (Blueprint $table) {
            $table->id();
            $table->string('lieu_depart', 100);
            $table->string('lieu_destination', 100);
            $table->dateTime('date_depart');
            $table->dateTime('date_arrivee');
            $table->enum('statut', ['Disponible', 'Complet', 'Annule']);
            $table->decimal('prix', 8, 2);
            $table->integer('places_disponibles');
            $table->unsignedBigInteger('conducteur_id');
            $table->foreign('conducteur_id')->references('utilisateur_id')->on('conducteurs')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('trajets');
    }
}
