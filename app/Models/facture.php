<?php 

    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Facture extends Model
    {
        use HasFactory;

        protected $table ='facture';
        protected $primaryKey='idFacture';
        public $timestamps = false;

        public function lots()
        {
            return $this->hasMany(Lot::class, 'idFacture');
        }

    }
    