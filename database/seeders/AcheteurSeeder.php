<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AcheteurSeeder extends Seeder
{
    public function run()
    {
        DB::table('acheteur')->insert([
            [
                'idAcheteur' => 1000,
                'loginA' => 'acheteur1000',
                'email' => 'acheteur1000@exemple.fr',
                'telA' => '0600000000',
                'pwd' => Hash::make('testSIOE62025'),
                'raisonSocialeEntreprise' => 'Entreprise 1000',
                'locRue' => '10 rue de la Mer',
                'rue' => '10 rue de la Mer',
                'cp' => '29000',
                'ville' => 'Quimper',
                'numHabilitation' => 'HAB1000',
            ],
        ]);
    }
}
