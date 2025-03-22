<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PetitePeche>
 */
use app\Models\Peche;

class PetitePecheFactory extends Factory
{
    public function definition(): array
    {
        return [
            //clés étrangères
            'idBateau' => Peche::inRandomOrder()->first()?->idBateau ?? Peche::factory()->create()->id,
            'datePeche' => Peche::inRandomOrder()->first()?->datePeche ?? Peche::factory()->create()->date('Y_m_d'),
        ];
    }
}
