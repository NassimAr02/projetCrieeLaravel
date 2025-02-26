<?php

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Factories\HasFactory;

    class Acheteur extends Model 
    {
        use HasFactory;
        protected $table='acheteur';
        protected $primaryKey = 'idAcheteur';
        public $timestamps = false;
        protected $fillable = ['loginA','pwd','raisonSocialeEntreprise','locRue','rue','ville','cp','numHabilitation'];
        // Relation One-to-Many (Un Acheteur a plusieurs Paniers)
    
        public function lots()
        {
            return $this->hasMany(Lot::class, 'idAcheteur');
        }
    }
?>