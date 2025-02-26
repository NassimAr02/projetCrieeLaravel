<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Bac extends Model
    {
        use HasFactory;

        protected $table='bac';
        protected $primaryKey ='idBac';
        public $timestamps = false;
        protected $fillable = ['tare','typeBac'];

        public function lots()
        {
            return $this->hasMany(Lot::class, 'idBac');
        }
    }