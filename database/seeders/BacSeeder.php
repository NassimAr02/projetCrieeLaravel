<?php

namespace Database\Seeders;

use App\Models\Bac;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BacSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bac::factory()->count(2)->create();
    }
}
