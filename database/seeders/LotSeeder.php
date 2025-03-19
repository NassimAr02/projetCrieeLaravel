<?php

namespace Database\Seeders;

use app\Models\Lot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lot::factory()->count(10)->create();
    }
}
