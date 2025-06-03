<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Presentation extends Model
    {
        use HasFactory;

        protected $table='presentation';
        protected $primaryKey ='idPresentation';
        public $incrementing = true;
        public $timestamps =false;
        protected $fillable = ['idBac','idQualite','idAcheteur','libelle'];

        public function lots()
        {
            return $this->hasMany(Lot::class, 'idPresentation');
        }
        public function bac()
        {
            return $this ->belongsTo(Bac::class, 'idBac', 'idBac');
        }
        public function qualite()
        {
            return $this ->belongsTo(Qualite::class, 'idQualite','idQualite');
        }
        public function acheteur()
        {
            return $this ->belongsTo(Acheteur::class, 'idAcheteur','idAcheteur');
        }
    }
?>