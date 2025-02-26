<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Taille extends Model
    {
        use HasFactory;
        protected $table='taille';
        protected $primaryKey = 'idTaille';
        public $timestamps = false;
        protected $fillable = ['specification'];

        public function lots()
        {
            return $this->hasMany(Lot::class, 'idtaille');
        }
    }
?>