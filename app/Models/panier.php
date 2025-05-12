<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Panier extends Model
{
    use HasFactory;
    protected $table ='panier';
    protected $primaryKey='idPanier';
    public $timestamps = false;
    protected $fillable=['idAcheteur','estFacture','dateFacture','total'];

    public function lots()
    {
        return $this->hasMany(Lot::class, 'idPanier', 'idPanier');
    }
    public function acheteur()
    {
        return $this->belongsTo(Acheteur::class,'idAcheteur','idAcheteur');
    }
}
