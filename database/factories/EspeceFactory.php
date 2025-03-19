<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Espece>
 */
class EspeceFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nomEspece' => $this->faker->userName(),
            'nomScientifiqueEspece' => $this->faker->name(),
            'nomCommunEspece' => $this->faker->randomElement(['poisson', 'crustacé']),
        ];
    }
}
