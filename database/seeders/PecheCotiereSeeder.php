<?php

namespace Database\Seeders;

use App\Models\PecheCotiere;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PecheCotiereSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PecheCotiere::factory()->count(10)->create();
    }
}
