<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use app\Models\Peche;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PecheCotiere>
 */
class PecheCotiereFactory extends Factory
{
    public function definition(): array
    {
        return [

          //clés étrangères
          'idBateau' => Peche::inRandomOrder()->first()?->id ?? Peche::factory()->create()->id,
          'datePeche' => Peche::inRandomOrder()->first()?->id ?? Peche::factory()->create()->date(),

        ];
    }
}
