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
        Schema::create('bac', function (Blueprint $table) {
            $table->id('idBac');
            $table->float('tare');
            $table->string('typeBac');
        });
        DB::table('bac')->insert([
            ['tare'=>2.5,'typeBac'=>'B'],
            ['tare'=>4.0,'typeBac'=>'F'],
        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bac');
    }
};
