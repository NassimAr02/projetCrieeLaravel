<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Presentation extends Model
    {
        use HasFactory;

        protected $table='presentation';
        protected $primaryKey ='idPresentation';
        public $timestamps =false;
        protected $fillable = ['libelle'];

        public function lots()
        {
            return $this->hasMany(Lot::class, 'idPresentation');
        }
    }
?>