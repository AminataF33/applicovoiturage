<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemandesTable extends Migration
{
    public function up()
{
    Schema::create('demandes', function (Blueprint $table) {
        $table->id();  
        $table->integer('conducteur_id'); 
        $table->integer('vehicule_id'); 
        $table->string('ville_depart');
        $table->string('ville_arrivee');
        $table->text('commentaire')->nullable();
        $table->timestamps();
    });
}


    public function down()
    {
        Schema::dropIfExists('demandes');
    }
}
