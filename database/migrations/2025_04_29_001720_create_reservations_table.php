<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->enum('statut', ['En attente', 'Confirmee', 'Annulee', 'Refusee']);
            $table->unsignedBigInteger('trajet_id');
            $table->unsignedBigInteger('passager_id');
            $table->foreign('trajet_id')->references('id')->on('trajets')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('passager_id')->references('utilisateur_id')->on('passagers')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
}
