<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuDungQuy extends Model
{
    protected $table = 'su_dung_quy';

    
    public function Student()
    {
        return $this->belongsTo('App\Student', 'phutrach');
    }
    public function KeHoachHoatDong()
    {
        return $this->belongsTo('App\KeHoachHoatDong', 'id_kehoach');
    }
    public function Quy()
    {
        return $this->belongsTo('App\Quy', 'id_quy');
    }
}
