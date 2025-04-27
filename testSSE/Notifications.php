<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $table ='notifications';
    protected $primaryKey ='idNotif';
    public $timestamps =false;
    protected $fillable = ['idNotif',];



     
}
