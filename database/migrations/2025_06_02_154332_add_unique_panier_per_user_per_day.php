<?php
// database/migrations/xxxx_xx_xx_xxxxxx_add_unique_panier_per_user_per_day.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('panier', function (Blueprint $table) {
            $table->unique(['idAcheteur', 'datePanier'], 'unique_panier_per_user_per_day');
        });
    }

    public function down()
    {
        Schema::table('panier', function (Blueprint $table) {
            $table->dropUnique('unique_panier_per_user_per_day');
        });
    }
};