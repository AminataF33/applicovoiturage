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
            $table->string('prenom');
            $table->string('nom');
            $table->string('email')->unique();
            $table->string('telephone')->unique();
            $table->string('adresse')->nullable();
            $table->string('password');
            $table->string('role')->default('passager');
            $table->timestamps(); 
        });
    }

    public function down(): void 
    {
        Schema::dropIfExists('utilisateur');
    }
}
