<?php

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
            $table->foreignId('voyage_id')->constrained()->onDelete('cascade');
            $table->foreignId('voyageur_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('prenom'); // Ajouter le champ prenom
            $table->string('nom'); // Ajouter le champ nom
            $table->string('telephone'); // Ajouter le champ telephone
            $table->string('payment_method'); // Assure-toi que cette ligne est présente
            $table->integer('nbrplace');
            $table->dateTime('date');
            $table->string('statut'); // confirmée ou annulée
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
