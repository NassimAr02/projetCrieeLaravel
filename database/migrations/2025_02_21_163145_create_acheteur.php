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
        Schema::create('acheteur', function (Blueprint $table) {
            $table->unsignedBigInteger('idAcheteur')->primary();
            $table->string('loginA');
            $table->string('pwd');
            $table->string('locRue');
            $table->string('rue');
            $table->string('ville');
            $table->string('cp');
            $table->string('numHabilitation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('acheteur');
    }
};
