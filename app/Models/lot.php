<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class Lot extends Model
    {
        use HasFactory;
        protected $table ='lot';
        // protected $table ='peche';
        protected $primaryKey = ['idBateau','datePeche','idLot'];
        public $incrementing = false;

        public $timestamps=false;

        protected $fillable = ['idBateau','datePeche','idLot','poidsBrutLot','prixPlancher','prixDepart','prixEnchereMax','dateEnchere','heureDebutEnchere','codeEtat','idTaille','idPresentation','idBac','idQualite','idEspece','idAcheteur','idPanier','idCriee'];

        public static function findComposite($idBateau, $datePeche, $idLot)
        {
            return self::where('idBateau', $idBateau)
                    ->where('datePeche', $datePeche)
                    ->where('idLot', $idLot)
                    ->first();
        }
        public function peche()
        {
            return $this->belongsTo(Peche::class,['idBateau','datePeche'],['idBateau','datePeche']);
        }
        public function taille()
        {
            return $this->belongsTo(Taille::class,'idTaille','idTaille');
        }
        public function presentation()
        {
            return $this->belongsTo(Presentation::class,'idPresentation','idPresentation');
        }
        public function bac()
        {
            return $this->belongsTo(Bac::class,'idBac','idBac');
        }
        public function qualite()
        {
            return $this->belongsTo(Qualite::class,'idQualite','idQualite');
        }
        public function espece()
        {
            return $this->belongsTo(Espece::class,'idEspece','idEspece');
        }
        public function acheteur()
        {
            return $this->belongsTo(Acheteur::class,'idAcheteur','idAcheteur');
        }
        public function panier()
        {
            return $this->belongsTo(Panier::class,'idPanier','idPanier');
        }
        public function posters()
        {
            return $this->hasMany(Poster::class,['idBateau','datePeche','idLot']);
        }
        public function criee()
        {
            return $this->belongsTo(Criee::class,'idCriee','idCriee');
        }

    }