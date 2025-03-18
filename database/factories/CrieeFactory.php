<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Criee>
 */
class CrieeFactory extends Factory
{
    public function definition(): array
    {
        return [
            'dateCriee' => $this->faker->date(),
            'heureDebut' => $this->faker->time(),
            'heureFin' => $this->faker->time(),
        ];
    }
}
