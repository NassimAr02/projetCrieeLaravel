<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            AcheteurSeeder::class,
            BateauSeeder::class,
            PecheSeeder::class,
            PetitePecheSeeder::class,
            PecheCotiereSeeder::class,
            CrieeSeeder::class,
            PanierSeeder::class,
            LotSeeder::class,
        ]);
    }
}
