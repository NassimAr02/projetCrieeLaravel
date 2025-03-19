<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Taille>
 */
class TailleFactory extends Factory
{
    public function definition(): array
    {
        return [
            'specification' => $this->faker->bothify('?-#'), 
        ];
    }
}
