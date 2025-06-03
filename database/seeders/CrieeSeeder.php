<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CrieeSeeder extends Seeder
{
    public function run()
    {
        DB::table('criee')->insert([
            [
                'dateCriee' => '2025-06-03',
                'heureDebut' => '15:40:00',
                'heureFin' => '16:22:00',
            ],
            [
                'dateCriee' => '2025-06-04',
                'heureDebut' => '07:00:00',
                'heureFin' => '13:00:00',
            ],
        ]);
    }
}
