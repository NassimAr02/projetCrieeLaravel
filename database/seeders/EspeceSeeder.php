<?php

namespace Database\Seeders;

use App\Models\Espece;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EspeceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Espece::factory()->count(5)->create();
    }
}
