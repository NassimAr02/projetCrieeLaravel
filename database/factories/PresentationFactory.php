<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Presentation>
 */

use app\Models\Bac;
use app\Models\Qualite;
use app\Models\Acheteur;

class PresentationFactory extends Factory
{
    public function definition(): array
    {
        return [
            'libelle' => $this->faker->randomElement(['Entier', 'Vidé']),

            //Clés étrangères
            'idAcheteur' => Acheteur::inRandomOrder()->first()?->idAcheteur ?? Acheteur::factory()->create()->id,
            'idQualite' => Qualite::inRandomOrder()->first()?->idQualite ?? Qualite::factory()->create()->id,
            'idBac' => Bac::inRandomOrder()->first()?->idBac ?? Bac::factory()->create()->id,

        ];
    }
}
