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
            $table->unsignedBigInteger('idPanier')->primary();
            $table->string('total');
            $table->unsignedBigInteger('idAcheteur');
            $table->foreign('idAcheteur')
                    ->references('idAcheteur')
                    ->on('acheteur')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('panier');
    }
};
