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
        Schema::create('notifications', function (Blueprint $table) {
            $table->unsignedBigInteger('idAcheteur');
            $table->unsignedBigInteger('idLot');
            $table->unsignedBigInteger('idBateau');
            $table->date('datePeche');
            $table->id('idNotif');
            $table->string('message')->nullable(false);
            $table->foreign('idAcheteur')->references('idAcheteur')->on('acheteur')->onDelete('cascade');
            $table->foreign(['idBateau','datePeche','idLot'])->references(['idBateau','datePeche','idLot'])->on('lot')->onDelete('cascade');
            $table->boolean('estPoster')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
