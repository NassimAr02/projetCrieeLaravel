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
        Schema::create('panier', function (Blueprint $table) {
            $table->unsignedBigInteger('idAcheteur');
            $table->id('idPanier');
            $table->date('datePanier')->default(now());
            $table->boolean('estFacture')->default(false);
            $table->date('dateFacture')->nullable();
            $table->float('total');
            $table->foreign('idAcheteur')->references('idAcheteur')->on('acheteur')->onDelete('cascade');
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