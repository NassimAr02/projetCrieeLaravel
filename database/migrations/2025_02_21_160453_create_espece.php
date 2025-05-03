<?php

use App\Models\Espece;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('espece', function (Blueprint $table) {
            $table->id('idEspece');
            $table->string('nomEspece');
            $table->string('nomScientifiqueEspece');
            $table->string('nomCommunEspece');
        });
        DB::table('espece')->insert([
            ['nomEspece' => 'Bar', 'nomScientifiqueEspece' => 'Dicentrarchus labrax', 'nomCommunEspece' => 'Bar commun'],
            ['nomEspece' => 'Dorade grise', 'nomScientifiqueEspece' => 'Spondyliosoma cantharus', 'nomCommunEspece' => 'Griset'],
            ['nomEspece' => 'Lieu jaune', 'nomScientifiqueEspece' => 'Pollachius pollachius', 'nomCommunEspece' => 'Lieu jaune'],
            ['nomEspece' => 'Maquereau', 'nomScientifiqueEspece' => 'Scomber scombrus', 'nomCommunEspece' => 'Maquereau'],
            ['nomEspece' => 'Sardine', 'nomScientifiqueEspece' => 'Sardina pilchardus', 'nomCommunEspece' => 'Sardine'],
            ['nomEspece' => 'Thon rouge', 'nomScientifiqueEspece' => 'Thunnus thynnus', 'nomCommunEspece' => "Thon rouge de l'Atlantique"],
            ['nomEspece' => 'Merlu', 'nomScientifiqueEspece' => 'Merluccius merluccius', 'nomCommunEspece' => 'Colin'],
            ['nomEspece' => 'Cabillaud', 'nomScientifiqueEspece' => 'Gadus morhua', 'nomCommunEspece' => 'Morue'],
            ['nomEspece' => 'Sole', 'nomScientifiqueEspece' => 'Solea solea', 'nomCommunEspece' => 'Sole commune'],
            ['nomEspece' => 'Rouget barbet', 'nomScientifiqueEspece' => 'Mullus surmuletus', 'nomCommunEspece' => 'Rouget de roche'],
            ['nomEspece' => 'Haddock', 'nomScientifiqueEspece' => 'Melanogrammus aeglefinus', 'nomCommunEspece' => 'Églefin'],
            ['nomEspece' => 'Homard', 'nomScientifiqueEspece' => 'Homarus gammarus', 'nomCommunEspece' => 'Homard européen'],
            ['nomEspece' => 'Tourteau', 'nomScientifiqueEspece' => 'Cancer pagurus', 'nomCommunEspece' => 'Crabe dormeur'],
            ['nomEspece' => 'Langoustine', 'nomScientifiqueEspece' => 'Nephrops norvegicus', 'nomCommunEspece' => 'Langoustine'],
            ['nomEspece' => 'Coquille Saint-Jacques', 'nomScientifiqueEspece' => 'Pecten maximus', 'nomCommunEspece' => 'Saint-Jacques'],
            ['nomEspece' => 'Moules', 'nomScientifiqueEspece' => 'Mytilus edulis', 'nomCommunEspece' => 'Moules de bouchot'],
            ['nomEspece' => 'Huitres', 'nomScientifiqueEspece' => 'Crassostrea gigas', 'nomCommunEspece' => 'Huitre creuse'],
            ['nomEspece' => 'Congre', 'nomScientifiqueEspece' => 'Conger conger', 'nomCommunEspece' => 'Congre'],
            ['nomEspece' => 'Roussette', 'nomScientifiqueEspece' => 'Scyliorhinus canicula', 'nomCommunEspece' => 'Petite roussette'],
            ['nomEspece' => 'Chapon', 'nomScientifiqueEspece' => 'Scorpaena scrofa', 'nomCommunEspece' => 'Chapon'],
            ['nomEspece' => 'Saint-Pierre', 'nomScientifiqueEspece' => 'Zeus faber', 'nomCommunEspece' => 'Saint-Pierre'],
            ['nomEspece' => 'Grondin rouge', 'nomScientifiqueEspece' => 'Chelidonichthys cuculus', 'nomCommunEspece' => 'Rouget grondin'],
            ['nomEspece' => 'Raie bouclée', 'nomScientifiqueEspece' => 'Raja clavata', 'nomCommunEspece' => 'Raie'],
            ['nomEspece' => 'Raie douce', 'nomScientifiqueEspece' => 'Raja montagui', 'nomCommunEspece' => 'Raie douce'],
            ['nomEspece' => 'Seiche', 'nomScientifiqueEspece' => 'Sepia officinalis', 'nomCommunEspece' => 'Seiche commune'],
            ['nomEspece' => 'Ormeau', 'nomScientifiqueEspece' => 'Haliotis tuberculata', 'nomCommunEspece' => 'Oreille de mer'],
            ['nomEspece' => 'Praire', 'nomScientifiqueEspece' => 'Venus verrucosa', 'nomCommunEspece' => 'Praire'],
            ['nomEspece' => 'Palourde', 'nomScientifiqueEspece' => 'Ruditapes decussatus', 'nomCommunEspece' => 'Palourde'],
            ['nomEspece' => 'Bigorneau', 'nomScientifiqueEspece' => 'Littorina littorea', 'nomCommunEspece' => 'Bigorneau'],
            ['nomEspece' => 'Coque', 'nomScientifiqueEspece' => 'Cerastoderma edule', 'nomCommunEspece' => 'Coque'],
            ['nomEspece' => 'Amande de mer', 'nomScientifiqueEspece' => 'Glycymeris glycymeris', 'nomCommunEspece' => 'Amande'],
            ['nomEspece' => 'Araignée de mer', 'nomScientifiqueEspece' => 'Maja squinado', 'nomCommunEspece' => 'Araignée de mer'],
            ['nomEspece' => 'Bulot', 'nomScientifiqueEspece' => 'Buccinum undatum', 'nomCommunEspece' => 'Bulot'],
            ['nomEspece' => 'Crevette rose', 'nomScientifiqueEspece' => 'Palaemon serratus', 'nomCommunEspece' => 'Crevette bouquet'],
            ['nomEspece' => 'Crevette grise', 'nomScientifiqueEspece' => 'Crangon crangon', 'nomCommunEspece' => 'Crevette grise'],
            ['nomEspece' => 'Calmar', 'nomScientifiqueEspece' => 'Loligo vulgaris', 'nomCommunEspece' => 'Encornet'],
            ['nomEspece' => 'Tacaud', 'nomScientifiqueEspece' => 'Trisopterus luscus', 'nomCommunEspece' => 'Tacaud'],
            ['nomEspece' => 'Mulet', 'nomScientifiqueEspece' => 'Mugil cephalus', 'nomCommunEspece' => 'Mulet doré'],
            ['nomEspece' => 'Vive', 'nomScientifiqueEspece' => 'Trachinus draco', 'nomCommunEspece' => 'Vive commune'],
            ['nomEspece' => 'Pageot', 'nomScientifiqueEspece' => 'Pagellus erythrinus', 'nomCommunEspece' => 'Pageot commun'],
            ['nomEspece' => 'Serran', 'nomScientifiqueEspece' => 'Serranus cabrilla', 'nomCommunEspece' => 'Serran cabrilla'],
            ['nomEspece' => 'Sabre noir', 'nomScientifiqueEspece' => 'Aphanopus carbo', 'nomCommunEspece' => 'Poisson sabre'],
            ['nomEspece' => 'Lieu noir', 'nomScientifiqueEspece' => 'Pollachius virens', 'nomCommunEspece' => 'Lieu noir'],
            ['nomEspece' => 'Chinchard', 'nomScientifiqueEspece' => 'Trachurus trachurus', 'nomCommunEspece' => 'Chinchard'],
            ['nomEspece' => 'Dorade royale', 'nomScientifiqueEspece' => 'Sparus aurata', 'nomCommunEspece' => 'Dorade royale'],
            ['nomEspece' => 'Turbot', 'nomScientifiqueEspece' => 'Scophthalmus maximus', 'nomCommunEspece' => 'Turbot'],
            ['nomEspece' => 'Carrelet', 'nomScientifiqueEspece' => 'Pleuronectes platessa', 'nomCommunEspece' => 'Plie'],
            ['nomEspece' => 'Espadon', 'nomScientifiqueEspece' => 'Xiphias gladius', 'nomCommunEspece' => 'Espadon'],
            ['nomEspece' => 'Anchois', 'nomScientifiqueEspece' => 'Engraulis encrasicolus', 'nomCommunEspece' => 'Anchois'],
            ['nomEspece' => 'Bonite', 'nomScientifiqueEspece' => 'Sarda sarda', 'nomCommunEspece' => 'Bonite à dos rayé']
        ]);
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('espece');
    }
};
