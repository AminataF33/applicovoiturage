<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConducteursTable extends Migration
{
    public function up(): void
    {
        Schema::create('conducteurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utilisateur_id')->constrained('utilisateur');
            $table->string('type_voiture'); // Info spécifique aux conducteurs
            $table->string('immatriculation');
            $table->timestamps();
        });        
    }

    public function down(): void
    {
        Schema::dropIfExists('conducteurs');
    }
}
