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
        Schema::create('presentation', function (Blueprint $table) {
            $table->id('idPresentation');
            $table->unsignedBigInteger('idBac');
            $table->unsignedBigInteger('idQualite');
            $table->unsignedBigInteger('idAcheteur');
            $table->string('libelle');
            $table->foreign('idAcheteur')->references('idAcheteur')->on('acheteur')->onDelete('cascade');
            $table->foreign('idBac')->references('idBac')->on('bac')->onDelete('cascade');
            $table->foreign('idQualite')->references('idQualite')->on('qualite')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presentation');
    }
};
