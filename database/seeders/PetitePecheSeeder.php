<?php

namespace Database\Seeders;

use App\Models\PetitePeche;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PetitePecheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PetitePeche::factory()->count(10)->create();
    }
}
