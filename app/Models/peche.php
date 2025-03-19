<?php
    
    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Factories\HasFactory;

    class Peche extends Model
    {
        use HasFactory;
        protected $table ='peche';
        public $incrementing = false; // Comme la clé primaire est composite, pas d'auto-incrémentation
        
        public $timestamps=false;

        protected $fillable = ['idBateau', 'datePeche']; // Colonnes modifiables en masse
        protected $primaryKey = null; 
        
        /**
         * Relation avec le modèle Bateau.
         * Un enregistrement dans `peche` appartient à un bateau.
         */
        public function bateau()
        {
            return $this->belongsTo(Bateau::class, 'idBateau', 'idBateau');
        }
        public function lots()
        {
            return $this->hasMany(Lot::class, 'idPeche');
        }
        public function petitePeche()
        {
            return $this->hasOne(PetitePeche::class);
        }

        public function pecheCotiere()
        {
            return $this->hasOne(PecheCotiere::class);
        }

    }
?>