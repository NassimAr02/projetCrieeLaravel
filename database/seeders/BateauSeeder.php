<?php

namespace Database\Seeders;

use App\Models\Bateau;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BateauSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bateau::factory()->count(5)->create(); 
    }
}
