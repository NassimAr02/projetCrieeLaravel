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

class LotFactory extends Factory
{
    public function definition(): array
    {
        return [
            'datePeche' => $this->faker->date(), // Date aléatoire
            'poidsBrutLot' => $this->faker->randomFloat(2, 1, 100), // Poids en kg (1 à 100 kg)
            'prixPlancher' => $this->faker->randomFloat(2, 10, 500), // Prix plancher en €
            'prixDepart' => $this->faker->randomFloat(2, 10, 500), // Prix de départ en €
            'prixEnchereMax' => $this->faker->optional()->randomFloat(2, 50, 1000), // Prix max d'enchère (optionnel)
            'dateEnchere' => $this->faker->date(),
            'heureDebutEnchere' => $this->faker->time(),
            'codeEtat' => $this->faker->randomElement(['NEUF', 'USÉ', 'BON']), // État du lot
            
            // Clés étrangères (vérifier que ces models existent)
            'idTaille' => Taille::inRandomOrder()->first()?->id ?? Taille::factory()->create()->id,
            'idPresentation' => Presentation::inRandomOrder()->first()?->id ?? Presentation::factory()->create()->id,
            'idBac' => Bac::inRandomOrder()->first()?->id ?? Bac::factory()->create()->id,
            'idQualite' => Qualite::inRandomOrder()->first()?->id ?? Qualite::factory()->create()->id,
            'idEspece' => Espece::inRandomOrder()->first()?->id ?? Espece::factory()->create()->id,
            'idAcheteur' => Acheteur::inRandomOrder()->first()?->id ?? Acheteur::factory()->create()->id,
            'idPanier' => Panier::inRandomOrder()->first()?->id ?? Panier::factory()->create()->id,
            'idCriee' => Criee::inRandomOrder()->first()?->id ?? Criee::factory()->create()->id,
        ];
    }
}
