<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Qualite extends Model 
    {
        use HasFactory;
        protected $table = 'QUALITE';
        protected $primaryKey ='idQualite';
        public $timestamps=false;
        protected $fillable =['specificationQualite,libeleQualite'];
        
        public function lots()
        {
            return $this->hasMany(Lot::class, 'idQualite');
        }
        public function presentation()
        {
            return $this->hasMany(Presentation::class,'idQualite');
        }
    }
?>