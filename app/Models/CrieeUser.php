<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class CrieeUser extends Model implements Authenticatable{

    use AuthenticatableTrait;

    protected $table ='user';
    protected $primaryKey = 'User';
    public $timestamps = false;

    protected $fillable = ['User', 'Password'];
    protected $hidden = ['Password'];

    public function getAuthPassword()
    {
        return $this->Password;
    }
    public function getAuthIdentifierName()
    {
        return 'User';
    }
    public function isAdmin()
    {
        return $this->getConnectionName() === 'mysql_admin';
    }
    public function isCommissaire()
    {
        return $this->getConnectionName() === 'mysql_commissaire';
    }
}