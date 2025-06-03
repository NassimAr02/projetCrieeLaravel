<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PecheCotiereSeeder extends Seeder
{
    public function run()
    {
        DB::table('peche_cotieres')->insert([
            [
                'idBateau' => 2,
                'datePeche' => '2025-06-02',
            ],
            [
                'idBateau' => 3,
                'datePeche' => '2025-06-02',
            ],
        ]);
    }
}
