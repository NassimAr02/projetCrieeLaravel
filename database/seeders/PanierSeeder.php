<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PanierSeeder extends Seeder
{
    public function run()
    {
        DB::table('panier')->insert([
            [
                'idAcheteur' => 1000,
                'datePanier' => '2025-06-03',
                'estFacture' => false,
                'dateFacture' => null,
                'total' => 1200.00
            ]
        ]);
    }
}
