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
        Schema::create('poster', function (Blueprint $table) {
            $table->unsignedBigInteger('idAcheteur');
            $table->unsignedBigInteger('idBateau');
            $table->date('datePeche');
            $table->unsignedBigInteger('idLot');
            $table->decimal('prixEnchere', 10, 2);
            $table->timestamp('tempsEnregistrement', $precision = 6)->useCurrent(); // Précision microsecondes
            
            $table->foreign('idAcheteur')->references('idAcheteur')->on('acheteur')->onDelete('cascade');
            $table->foreign(['idBateau','datePeche','idLot'])->references(['idBateau','datePeche','idLot'])->on('lot')->onDelete('cascade');
            
            $table->primary(['idAcheteur','idBateau','datePeche','idLot','tempsEnregistrement']);
            
            $table->index('tempsEnregistrement');
            $table->index('prixEnchere');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poster');
    }
};
