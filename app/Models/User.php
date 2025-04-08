<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Ajout du champ role
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getConnectionName()
    {
        return match($this->role) {
            'admin' => 'mysql_admin',
            'commissaire' => 'mysql_commissaire',
            default => 'mysql'
        };
    }

    // Méthodes helpers
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isCommissaire(): bool
    {
        return $this->role === 'commissaire';
    }
}