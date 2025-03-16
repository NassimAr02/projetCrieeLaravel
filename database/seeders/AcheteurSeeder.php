<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\acheteur;

class AcheteurSeeder extends Seeder
{
    public function run(): void
    {
        acheteur::factory()->count(10)->create(); // Génère 10 acheteurs
    }
}
