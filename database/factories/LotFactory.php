<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Acheteur;
use App\Models\Taille;
use App\Models\Presentation;
use App\Models\Bac;
use App\Models\Qualite;
use App\Models\Espece;
use App\Models\Panier;
use App\Models\Criee;
use App\Models\Bateau; //dmder plus tard pour id bateau
use App\Models\Peche;

class LotFactory extends Factory
{
    public function definition(): array
    {
        $peche = Peche::inRandomOrder()->first() ?? Peche::factory()->create();
        
        return [

            'idLot' => $this->faker->randomNumber(), //Trouver un autre moyen pour l'id
            
            // 'poidsBrutLot' => $this->faker->randomFloat(2, 1, 100), // Poids en kg (1 à 100 kg)
            'poidsBrutLot' => $this->faker->numerify('##-kg'), // Poids en kg (1 à 100 kg)

            'prixPlancher' => $this->faker->randomFloat(2, 10, 500), // Prix plancher en €
            'prixDepart' => $this->faker->randomFloat(2, 10, 500), // Prix de départ en €
            'prixEnchereMax' => $this->faker->randomFloat(2, 50, 1000), // Prix max d'enchère (optionnel)
            'dateEnchere' => $this->faker->date('Y_m_d'),
            'heureDebutEnchere' => $this->faker->time(),
            // 'codeEtat' => $this->faker->randomElement(['NEUF', 'USÉ', 'BON']), // État du lot
            'codeEtat' => $this->faker->randomDigit(), // État du lot
            
            // Clés étrangères (vérifier que ces models existent)
            'idTaille' => Taille::inRandomOrder()->first()?->idTaille ?? Taille::factory()->create()->id,
            'idPresentation' => Presentation::inRandomOrder()->first()?->idPresentation ?? Presentation::factory()->create()->idPresentation,
            'idBac' => Bac::inRandomOrder()->first()?->idBac ?? Bac::factory()->create()->id,
            'idQualite' => Qualite::inRandomOrder()->first()?->idQualite ?? Qualite::factory()->create()->id,
            'idEspece' => Espece::inRandomOrder()->first()?->idEspece ?? Espece::factory()->create()->id,
            'idAcheteur' => Acheteur::inRandomOrder()->first()?->idAcheteur ?? Acheteur::factory()->create()->idAcheteur,
            'idPanier' => Panier::inRandomOrder()->first()?->idPanier ?? Panier::factory()->create()->id,
            'idCriee' => Criee::inRandomOrder()->first()?->idCriee ?? Criee::factory()->create()->id,
            
            // Clé étrangère composite
            'idBateau' => $peche->idBateau,
            'datePeche' => $peche->datePeche,

            // 'datePeche' => $this->faker->date('Y_m_d'), // Date aléatoire
        ];
    }
}
