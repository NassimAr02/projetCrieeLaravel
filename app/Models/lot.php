<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Relations\BelongsTo;

    class Lot extends Model
    {
        use HasFactory;
        protected $table ='peche';
        public $incrementing = false;

        public $timestamps=false;

        protected $fillable = ['idBateau','datePeche','idLot','poidsBrutLot','prixPlancher','prixDepart','prixEnchereMax','dateEnchere','heureDebutEnchere','codeEtat','idTaille','idPresentation','idBac','idQualite','idEspece','idAcheteur','idPanier'];

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
        public function facture()
        {
            return $this->belongsTo(Facture::class,'idFacture','idFacture');
        }
        public function posters()
        {
            return $this->hasMany(Poster::class,['idBateau','datePeche','idLot']);
        }
    }