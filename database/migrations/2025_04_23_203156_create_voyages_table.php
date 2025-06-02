<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('voyages', function (Blueprint $table) {
            $table->id();
            $table->string('destination');
            $table->date('date_depart');
            $table->date('date_retour');
            $table->decimal('prix', 8, 2);
            $table->integer('places_disponibles');
            $table->text('description')->nullable();
            $table->string('lieu_depart')->nullable();
            $table->string('heure_depart', 5)->nullable();  // Format HH:mm
            $table->string('heure_arrivee', 5)->nullable(); // Format HH:mm
            $table->integer('nbr_arret')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('voyages');
    }
};
