<?php

namespace Database\Seeders;

use App\Models\Poster;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PosterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Poster::factory()->count(10)->create();
    }
}
