<?php

    namespace App\Models;


    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Acheteur extends Authenticatable
    {
        use HasFactory,Notifiable;
        
        protected $table='acheteur';
        protected $primaryKey = 'idAcheteur';
        public $timestamps = false;
        protected $fillable = ['loginA','emailA','telA','pwd','raisonSocialeEntreprise','locRue','rue','ville','cp','numHabilitation'];
        // Relation One-to-Many (Un Acheteur a plusieurs Paniers)
    
        /**
     * Get the password for the user.
     *
     * @return string
     */
        public function lots()
        {
            return $this->hasMany(Lot::class, 'idAcheteur');

        }
        public function getEmailForPasswordReset()
        {
            return $this->emailA;
        }
        public function getAuthPassword()
        {
            return $this->pwd;
        }
    }
?>