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
                $table->string('nom');
                $table->string('prenom');
                $table->string('email')->unique();
                $table->string('telephone')->unique();
                $table->string('password');
                $table->string('role'); 
                $table->timestamps();
            });
            
    } 

    public function down(): void 
    {
        Schema::dropIfExists('utilisateur');
    }
}
