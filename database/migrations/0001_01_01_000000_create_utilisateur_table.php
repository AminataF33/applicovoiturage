<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUtilisateurTable extends Migration
{
    public function up(): void
    {
        Schema::create('utilisateur', function (Blueprint $table) {
            $table->id(); 
            $table->string('nom', 100);
            $table->string('prenom', 100);
            $table->string('telephone', 15)->unique();
            $table->string('email', 70)->unique();
            $table->string('mot_de_passe', 255);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('utilisateur');
    }
}
