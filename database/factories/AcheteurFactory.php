<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Acheteur>
 */
class AcheteurFactory extends Factory
{
    public function definition(): array
    {
        return [
            'loginA' => $this->faker->unique()->userName(),
            'pwd' => bcrypt('password'), // Mot de passe par défaut (modifiable)
            'raisonSocialeEntreprise' => $this->faker->company(),
            'locRue' => $this->faker->buildingNumber(),
            'rue' => $this->faker->streetName(),
            'ville' => $this->faker->city(),
            'cp' => $this->faker->postcode(),
            'numHabilitation' => $this->faker->unique()->randomNumber(6, true),
        ];
    }
}
