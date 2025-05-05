<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Criee extends Model
{
    use HasFactory;
    protected $table='criee';
    protected $primaryKey='idCriee';
    public $timestamps = false;
    protected $fillable = ['dateCriee','heureDebut','heureFin'];

    public function lots()
    {
        return $this->hasMany(Lot::class, 'idCriee');
    }
}
