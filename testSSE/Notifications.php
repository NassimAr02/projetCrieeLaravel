<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $table ='notifications';
    protected $primaryKey ='idNotif';
    public $timestamps =false;
    protected $fillable = ['idNotif','message','idBateau','datePeche','idLot','idAcheteur'];

    public function acheteur()
    {
        return $this->belongsTo(Acheteur::class,['idAcheteur'],['idAcheteur']);
    }
    public function lot()
    {
        return $this->belongsTo(Lot::class,['idBateau','datePeche','idLot'],['idBateau','datePeche','idLot']);
    }


     
}
