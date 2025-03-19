<?php

namespace Database\Seeders;

use App\Models\Taille;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TailleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Taille::factory()->count(3)->create();
    }
}
