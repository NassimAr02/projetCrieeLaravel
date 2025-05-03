<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Model;
    use Illuminate\Database\Eloquent\Factories\HasFactory;

    class Poster extends Model
    {
        use HasFactory;

        protected $table ='poster';
        public $incrementing = false;

        public $timestamps = false;

        protected $fillable = ['idAcheteur','idBateau','datePeche','idLot','prixEnchere','heureEnchere','tempsEnregistrement'];

        public function Lot()
        {
            return $this->belongsTo(Lot::class,['idBateau','datePeche','idLot'],['idBateau','datePeche','idLot']);
        }
        public function Acheteur()
        {
            return $this->belongsTo(Acheteur::class,['idAcheteur'],['idAcheteur']);
        }
    }