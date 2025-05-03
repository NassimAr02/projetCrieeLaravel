<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('qualite', function (Blueprint $table) {
            $table->id('idQualite');
            $table->string('specificationQualite');
            $table->string('libeleQualite');
        });
        DB::table('qualite')->insert([
            ['specificationQualite' => 'E', 'libeleQualite' => 'Extra'],
            ['specificationQualite' => 'A', 'libeleQualite' => 'Glacé'],
            ['specificationQualite' => 'B', 'libeleQualite' => 'Déclassé'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qualite');
    }
};
