<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PecheCotiere extends Model
{
    /** @use HasFactory<\Database\Factories\PecheCotiereFactory> */
    use HasFactory;

    public $timestamps = false; //Pour le seeder, retirer si cela casse le model
    
    protected $fillable = ['idBateau','datePeche'];
    public $incrementing = false; // Comme la clé primaire est composite, pas d'auto-incrémentation
    protected $primaryKey = null;
    
    public function peche()
    {
        return $this->belongsTo(Peche::class);
    }
}
