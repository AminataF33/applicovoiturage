<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePassagersTable extends Migration
{
    public function up(): void
    {
        Schema::create('passagers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('utilisateur_id')->constrained('utilisateur');
            $table->string('preferences'); // Info spécifique aux passagers
            $table->timestamps();
        });
        
    }

    public function down(): void
    {
        Schema::dropIfExists('passagers');
    }
}
