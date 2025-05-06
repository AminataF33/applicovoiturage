<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGerersTable extends Migration
{
    public function up(): void
    {
        Schema::create('gerers', function (Blueprint $table) {
            $table->id('id_gerer');
            $table->string('description', 255);
            $table->unsignedBigInteger('admin_id');
            $table->unsignedBigInteger('utilisateur_id');
            $table->foreign('admin_id')->references('id')->on('administrateurs')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('utilisateur_id')->references('id')->on('utilisateur')->onUpdate('cascade')->onDelete('restrict');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gerers');
    }
}
