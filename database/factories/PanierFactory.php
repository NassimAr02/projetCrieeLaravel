<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Acheteur;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Panier>
 */
class PanierFactory extends Factory
{
    public function definition(): array
    {
        return [
            'total' => $this->faker->randomFloat(),

            //clé étrangères 
            'idAcheteur' => Acheteur::inRandomOrder()->first()?->idAcheteur ?? Acheteur::factory()->create()->id,
        ];
    }
}
