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
        Schema::create('taille', function (Blueprint $table) {
            $table->id('idTaille');
            $table->string('specification');
        });
        DB::table('taille')->insert([
            ['specification' => 'T1'],
            ['specification' => 'T2'],
            ['specification' => 'T3'],
            ['specification' => 'T4'],
            ['specification' => 'T5'],
            ['specification' => 'T6'],
            ['specification' => 'T7'],
            ['specification' => 'T8'],
            ['specification' => 'T9'],
        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taille');
    }
};
