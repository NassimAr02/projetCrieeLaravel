<?php

namespace Database\Seeders;

use App\Models\Criee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CrieeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Criee::factory()->count(5)->create();
    }
}
