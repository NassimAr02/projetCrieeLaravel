<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class userEvolution extends Authenticatable
{
    protected $table = 'user_evolution';
    public $incrementing = true;
    protected $primaryKey = 'idUser';
    public $timestamps = false;

    protected $fillable = [
        'idUser',
        'email',
        'mdpUser',
        'nomUser',
        'prenomUser'
    ];

    protected $casts = [
        'idUser' => 'integer'
    ];
    
    public function getEmailForPasswordReset()
    {
       return $this->email;
    }
    public function getAuthPassword()
    {
        return $this->mdpUser;
    }
}
