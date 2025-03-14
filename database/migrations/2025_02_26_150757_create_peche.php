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
        Schema::create('peche', function (Blueprint $table) {
            $table->id('idBateau');
            $table->date('datePeche');
            $table->foreign('idBateau')
                    ->references('idBateau')
                    ->on('bateau')
                    ->onDelete('cascade');
            $table->primary(['idBateau','datePeche']);
            $table->string('typePeche');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peche');
    }
};
