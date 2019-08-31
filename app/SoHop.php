<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoHop extends Model
{
    protected $table = 'so_hop';

    public function User()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
    public function KeHoachHoatDong()
    {
        return $this->hasMany('App\KeHoachHoatDong', 'id_sohop');
    }
}
