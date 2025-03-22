<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Peche>
 */

use app\Models\Bateau;

class PecheFactory extends Factory
{
    public function definition(): array
    {
        return [
            'datePeche' => $this->faker->date('Y_m_d'),
            'typePeche' => $this->faker->randomElement(['Petite Pêche', 'Pêche Côtière']),

            //Clé étrangère
            'idBateau' => Bateau::inRandomOrder()->first()?->idBateau ?? Bateau::factory()->create()->id,
        ];
    }
}
