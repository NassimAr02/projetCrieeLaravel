<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poster>
 */

use app\Models\Lot;
use app\Models\Acheteur;


class PosterFactory extends Factory
{

    public function definition(): array
    {
        return [
            'prixEnchere' => $this->faker->randomFloat(),
            'heureEnchere' => $this->faker->randomFloat(),
            
            //Clés étrangères
            'idBateau' => Lot::inRandomOrder()->first()?->id ?? Lot::factory()->create()->id,
            'datePeche' => Lot::inRandomOrder()->first()?->id ?? Lot::factory()->create()->date('Y_m_d'),
            'idLot' => Lot::inRandomOrder()->first()?->id ?? Lot::factory()->create()->id,
        ];
    }
}
