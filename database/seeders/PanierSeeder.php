<?php

namespace Database\Seeders;

use App\Models\Panier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PanierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Panier::factory()->count(10)->create();
    }
}
