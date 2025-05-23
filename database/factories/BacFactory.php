<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bac>
 */
class BacFactory extends Factory
{
    // /**
    //  * Define the model's default state.
    //  *
    //  * @return array<string, mixed>
    //  */

    public function definition(): array
    {
        return [
            'tare' => $this->faker->randomFloat(),
            'typeBac' => $this->faker->name(),
        ];
    }
}
