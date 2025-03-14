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
        Schema::create('espece', function (Blueprint $table) {
            $table->id('idEspece');
            $table->string('nomEspece');
            $table->string('nomScientifiqueEspece');
            $table->string('nomCommunEspece');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('espece');
    }
};
