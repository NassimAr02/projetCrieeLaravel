<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Qualite>
 */
class QualiteFactory extends Factory
{
    public function definition(): array
    {
        return [
            'specificationQualite' => $this->faker->randomElement(['E', 'A', 'B']),
            'libeleQualite'	=> $this->faker->randomElement(['Extra','Glacé','Déclassé']), //à ajouter plus tard
        ];
    }
}
