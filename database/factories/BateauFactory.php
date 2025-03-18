<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bateau>
 */
class BateauFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nomBateau' => $this->faker->name(),
        ];
    }
}
