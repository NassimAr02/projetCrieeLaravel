<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BateauSeeder extends Seeder
{
    public function run()
    {
        DB::table('bateau')->insert([
            [
                'idBateau' => 1,
                'nomBateau' => 'L’Étoile du Matin',
            ],
            [
                'idBateau' => 2,
                'nomBateau' => 'Le Grand Large',
            ],
            [
                'idBateau' => 3,
                'nomBateau' => 'La Belle Mer',
            ],
        ]);
    }
}
