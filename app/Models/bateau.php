<?php
    namespace App\Models;

    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Bateau extends Model
    {
        use HasFactory;
        
        protected $table ='bateau';
        protected $primaryKey ='idBateau';
        public $timestamps = false;
        protected $fillable = ['nomBateau'];

        public function peche() 
        {
            return $this->hasMany(Peche::class,'idBateau');
        }
    }

     
?>