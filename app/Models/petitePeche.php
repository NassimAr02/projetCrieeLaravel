<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetitePeche extends Model
{
    /** @use HasFactory<\Database\Factories\PetitePecheFactory> */
    use HasFactory;
    protected $fillable = ['idBateau','datePeche'];
    public $incrementing = false; // Comme la clé primaire est composite, pas d'auto-incrémentation
    protected $primaryKey = null;
    public $timestamps = false;
    public function peche()
    {
        return $this->belongsTo(Peche::class);
    }

}
