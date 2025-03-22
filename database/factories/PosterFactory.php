<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Poster>
 */

use app\Models\Lot;
use app\Models\Acheteur;


class PosterFactory extends Factory
{

    public function definition(): array
    {
        return [
            'prixEnchere' => $this->faker->randomFloat(),
            'heureEnchere' => $this->faker->time(),
            
            //Clés étrangères
            'idBateau' => Lot::inRandomOrder()->first()?->idBateau ?? Lot::factory()->create()->id,
            'datePeche' => Lot::inRandomOrder()->first()?->datePeche ?? Lot::factory()->create()->date('Y_m_d'),
            'idLot' => Lot::inRandomOrder()->first()?->idLot ?? Lot::factory()->create()->id,
            'idAcheteur' => Acheteur::inRandomOrder()->first()?->idAcheteur ?? Acheteur::factory()->create()->idAcheteur, //supprimer si ca ne fonctionne pas
        ];
    }
}
