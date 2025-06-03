<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LotSeeder extends Seeder
{
    public function run()
    {
        DB::table('lot')->insert([
            [
                'idBateau' => 1,
                'datePeche' => '2025-06-01',
                'idLot' => 1,
                'poidsBrutLot' => '100',
                'prixPlancher' => 10.5,
                'prixDepart' => 12.0,
                'prixEnchereMax' => 15.0,
                'dateEnchere' => '2025-06-03',
                'heureDebutEnchere' => '08:00:00',
                'codeEtat' => 'Terminee',
                'idTaille' => 1,
                'idPresentation' => null,
                'idBac' => 1,
                'idQualite' => 1,
                'idEspece' => 1,
                'idAcheteur' => 1000,
                'idPanier' => 1,
                'idCriee' => 1
            ],
            [
                'idBateau' => 2,
                'datePeche' => '2025-06-02',
                'idLot' => 1,
                'poidsBrutLot' => '150',
                'prixPlancher' => 15.0,
                'prixDepart' => 18.0,
                'prixEnchereMax' => 20.0,
                'dateEnchere' => '2025-06-03',
                'heureDebutEnchere' => '08:30:00',
                'codeEtat' => 'Terminee',
                'idTaille' => 2,
                'idPresentation' => null,
                'idBac' => 2,
                'idQualite' => 2,
                'idEspece' => 2,
                'idAcheteur' => 1000,
                'idPanier' => 1,
                'idCriee' => 1
            ],
            [
                'idBateau' => 3,
                'datePeche' => '2025-06-02',
                'idLot' => 1,
                'poidsBrutLot' => '200',
                'prixPlancher' => 20.0,
                'prixDepart' => 22.0,
                'prixEnchereMax' => null,
                'dateEnchere' => null,
                'heureDebutEnchere' => null,
                'codeEtat' => 'En attente',
                'idTaille' => 3,
                'idPresentation' => null,
                'idBac' => 1,
                'idQualite' => 3,
                'idEspece' => 3,
                'idAcheteur' => null,
                'idPanier' => null,
                'idCriee' => 1
            ],
        ]);
    }
}
