<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PetitePecheSeeder extends Seeder
{
    public function run()
    {
        DB::table('petite_peches')->insert([
            [
                'idBateau' => 1,
                'datePeche' => '2025-06-01',
            ],
        ]);
    }
}
