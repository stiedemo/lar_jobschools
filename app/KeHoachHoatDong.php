<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KeHoachHoatDong extends Model
{
    protected $table = 'ke_hoach_hoat_dong';

    
    public function PhanCongKeHoach()
    {
        return $this->hasMany('App\PhanCongKeHoach', 'id_kehoach');
    }
    public function Quy()
    {
        return $this->hasMany('App\Quy', 'id_kehoach');
    }
    public function SoHop()
    {
        return $this->belongsTo('App\SoHop', 'id_sohop');
    }

}
