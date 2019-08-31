<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quy extends Model
{
    protected $table = 'quy';

    
    public function User()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
    public function SuDungQuy()
    {
        return $this->hasMany('App\SuDungQuy', 'id_quy');
    }
    public function DongGGopQuy()
    {
        return $this->hasMany('App\DongGGopQuy', 'id_quy');
    }
}
