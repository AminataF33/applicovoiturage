<?php

// use Illuminate\Database\Migrations\Migration;
// use Illuminate\Database\Schema\Blueprint;
// use Illuminate\Support\Facades\Schema;

// class CreateReservationsTable extends Migration
// {
//     public function up(): void
//     {
//         Schema::create('reservations', function (Blueprint $table) {
//             $table->id();
//             $table->enum('statut', ['En attente', 'Confirmee', 'Annulee', 'Refusee']);
//             $table->unsignedBigInteger('trajet_id');
//             $table->unsignedBigInteger('passager_id');
//             $table->foreign('trajet_id')->references('id')->on('trajets')->onUpdate('cascade')->onDelete('restrict');
//             $table->foreign('passager_id')->references('utilisateur_id')->on('passagers')->onUpdate('cascade')->onDelete('restrict');
//             $table->timestamps();
//         });
//     }

//     public function down(): void
//     {
//         Schema::dropIfExists('reservations');
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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('trajet_id')->constrained()->onDelete('cascade');
            $table->foreignId('passager_id')->constrained('utilisateur')->onDelete('cascade');
            $table->integer('nombre_places')->default(1);
            $table->decimal('montant', 8, 2);
            $table->timestamp('date_reservation')->useCurrent();
            $table->string('statut')->default('en attente'); // confirmé, en attente, annulé
            $table->text('commentaire')->nullable();
            $table->string('point_rencontre')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};