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
        Schema::create('lot', function (Blueprint $table) {
            $table->unsignedBigInteger('idBateau');
            $table->date('datePeche');
            $table->unsignedBigInteger('idLot');

            $table->string('poidsBrutLot');
            $table->float('prixPlancher');
            $table->float('prixDepart');
            $table->float('prixEnchereMax');
            $table->date('dateEnchere');
            $table->time('heureDebutEnchere');
            $table->integer('codeEtat');
            $table->unsignedBigInteger('idTaille');
            $table->unsignedBigInteger('idPresentation');
            $table->unsignedBigInteger('idBac');
            $table->unsignedBigInteger('idQualite');
            $table->unsignedBigInteger('idEspece');
            $table->unsignedBigInteger('idAcheteur');
            $table->unsignedBigInteger('idFacture');

            $table->foreign(['idBateau','datePeche'])->references(['idBateau','datePeche'])->on('peche')->onDelete('cascade');
            $table->foreign('idTaille')->references('idTaille')->on('taille')->onDelete('cascade');
            $table->foreign('idPresentation')->references('idPresentation')->on('presentation')->onDelete('cascade');
            $table->foreign('idBac')->references('idBac')->on('bac')->onDelete('cascade');
            $table->foreign('idQualite')->references('idQualite')->on('qualite')->onDelete('cascade');
            $table->foreign('idEspece')->references('idEspece')->on('espece')->onDelete('cascade');
            $table->foreign('idAcheteur')->references('idAcheteur')->on('acheteur')->onDelete('cascade');
            $table->foreign('idFacture')->references('idFacture')->on('facture')->onDelete('cascade');
            $table->primary(['idBateau','datePeche','idLot']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lot');
    }
};
