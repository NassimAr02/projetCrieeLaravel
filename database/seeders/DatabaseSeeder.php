<?php

namespace Database\Seeders;

use App\Models\Bac;
use App\Models\Criee;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call(QualiteSeeder::class);
        $this->call(TailleSeeder::class);

        $this->call(AcheteurSeeder::class);
        $this->call(BacSeeder::class);
        $this->call(BateauSeeder::class);
        $this->call(CrieeSeeder::class);
        $this->call(EspeceSeeder::class);

        $this->call(PecheSeeder::class);
        $this->call(PecheCotiereSeeder::class);
        $this->call(PetitePecheSeeder::class);
        
        $this->call(PanierSeeder::class);
        $this->call(LotSeeder::class);
       
        $this->call(PosterSeeder::class);
        $this->call(PresentationSeeder::class);
        
    }
}
