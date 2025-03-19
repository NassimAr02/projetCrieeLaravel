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
            'nomBateau' => $this->faker->randomNumber(),

            //clé étrangères 
            'idAcheteur' => Acheteur::inRandomOrder()->first()?->id ?? Acheteur::factory()->create()->id,
        ];
    }
}
