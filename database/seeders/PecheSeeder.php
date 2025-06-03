<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PecheSeeder extends Seeder
{
    public function run()
    {
        DB::table('peche')->insert([
            [
                'idBateau' => 1,
                'datePeche' => '2025-06-01',
                'typePeche' => 'Petite pêche',
            ],
            [
                'idBateau' => 2,
                'datePeche' => '2025-06-02',
                'typePeche' => 'Pêche côtière',
            ],
            [
                'idBateau' => 3,
                'datePeche' => '2025-06-02',
                'typePeche' => 'Pêche côtière',
            ],
        ]);
    }
}
