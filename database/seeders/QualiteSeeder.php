<?php

namespace Database\Seeders;

use App\Models\Qualite;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QualiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Qualite::factory()->count(5)->create();
    }
}
