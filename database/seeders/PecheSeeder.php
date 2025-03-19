<?php

namespace Database\Seeders;

use App\Models\Peche;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PecheSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Peche::factory()->count(10)->create();
    }
}
