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
        Schema::create('acheteur', function (Blueprint $table) {
            $table->id('idAcheteur');
            $table->string('loginA');
            $table->string('email');
            $table->string('telA');
            $table->string('pwd');
            $table->string('raisonSocialeEntreprise');
            $table->string('locRue');
            $table->string('rue');
            $table->string('cp');
            $table->string('ville');
            $table->string('numHabilitation');
        });
        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
        DB::table('acheteur')->insert([
            ['idAcheteur'=>999, 'loginA'=>'commissaire', 'email'=>'commissair@cornouaille.fr', 'telA'=>'0298700000', 'pwd'=>'commissaire', 'raisonSocialeEntreprise'=>'Commissaire', 'locRue'=>'Rue du commissaire', 'rue'=>'Rue du commissaire', 'cp'=>'29000', 'ville'=>'Quimper', 'numHabilitation'=>'123456789'],
        ]);
    }

   
    public function down(): void
    {
        Schema::dropIfExists('acheteur');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
