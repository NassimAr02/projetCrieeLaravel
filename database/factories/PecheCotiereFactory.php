<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Peche;
use App\Models\PecheCotiere;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PecheCotiere>
 */
class PecheCotiereFactory extends Factory
{
    protected $model = PecheCotiere::class; // ligne pour bien associer la factory au modèle

    public function definition(): array
    {
        // Récupérer un enregistrement Peche existant ou en créer un si la table est vide
        $peche = Peche::inRandomOrder()->first() ?? Peche::factory()->create();

        return [
            'idBateau' => $peche->idBateau, // Utiliser l'idBateau de Peche existant
            'datePeche' => $peche->datePeche, // Utiliser la datePeche de Peche existant
        ];
    }
}


// namespace Database\Factories;

// use Illuminate\Database\Eloquent\Factories\Factory;
// use App\Models\Peche;
// use App\Models\PecheCotiere;

// /**
//  * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PecheCotiere>
//  */
// class PecheCotiereFactory extends Factory
// {
//     protected $model = PecheCotiere::class;

//     public function definition(): array
//     {
//         // Assurer l'unicité de idBateau et datePeche
//         do {
//             $peche = Peche::inRandomOrder()->first() ?? Peche::factory()->create();
//         } while (PecheCotiere::where('idBateau', $peche->idBateau)->where('datePeche', $peche->datePeche)->exists());

//         return [
//             'idBateau' => $peche->idBateau,
//             'datePeche' => $peche->datePeche,
//         ];
//     }
// }
