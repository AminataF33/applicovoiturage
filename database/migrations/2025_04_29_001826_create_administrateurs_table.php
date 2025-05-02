<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrateursTable extends Migration
{
    public function up(): void
    {
        Schema::create('administrateurs', function (Blueprint $table) {
            $table->id();
            $table->string('nom', 100);
            $table->string('prenom', 100);
            $table->string('login', 100)->unique();
            $table->string('email', 70);
            $table->string('mot_de_passe', 255);
            $table->string('fonction', 100)->nullable();
            $table->boolean('actif')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('administrateurs');
    }
}
