<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhanCongKeHoach extends Model
{
    protected $table = 'phan_cong_ke_hoach';

    
    public function KeHoachHoatDong()
    {
        return $this->belongsTo('App\KeHoachHoatDong', 'id_kehoach');
    }
    public function Student()
    {
        return $this->belongsTo('App\Student', 'id_student');
    }
    public function ThoiGianBieu()
    {
        return $this->hasMany('App\ThoiGianBieu', 'id_thoikhoabieu');
    }
}
