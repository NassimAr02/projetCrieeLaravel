<?php
    namespace App\Models;
    
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Espece extends Model
    {
        protected $table = 'espece';
        protected $primaryKey ='idEspece';
        public $timestamps = false;
        protected $fillable = ['nomEspece','nomScientifiqueEspece','nomCommunEspece'];

        public function lots()
        {
            return $this->hasMany(Lot::class, 'idEspece');
        }
    }

?>