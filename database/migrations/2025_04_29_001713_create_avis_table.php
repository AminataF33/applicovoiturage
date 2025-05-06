<?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// class CreateAvisTable extends Migration
// {
//     public function up(): void
//     {
//         Schema::create('avis', function (Blueprint $table) {
//             $table->id('id_avis');
//             $table->tinyInteger('note')->unsigned();
//             $table->string('commentaire', 255)->nullable();
//             $table->unsignedBigInteger('passager_id');
//             $table->unsignedBigInteger('conducteur_id');
//             $table->foreign('passager_id')->references('utilisateur_id')->on('passagers')->onUpdate('cascade')->onDelete('restrict');
//             $table->foreign('conducteur_id')->references('utilisateur_id')->on('conducteurs')->onUpdate('cascade')->onDelete('restrict');
//             $table->timestamps();

//             $table->check('note >= 1 AND note <= 5');
//         });
//     }

//     public function down(): void
//     {
//         Schema::dropIfExists('avis');
//     }
// }


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('avis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('auteur_id')->constrained('utilisateur')->onDelete('cascade');
            $table->foreignId('destination_id')->constrained('utilisateur')->onDelete('cascade');
            $table->foreignId('trajet_id')->constrained()->onDelete('cascade');
            $table->foreignId('reservation_id')->nullable()->constrained()->onDelete('cascade');
            $table->integer('note'); // de 1 à 5
            $table->text('commentaire')->nullable();
            $table->timestamp('date_avis')->useCurrent();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avis');
    }
};