<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiemDanh extends Model
{
    protected $table = 'diem_danh';

    
    public function ThoiGianBieu()
    {
        return $this->belongsTo('App\ThoiGianBieu', 'id_thoigianbieu');
    }
    public function Student()
    {
        return $this->belongsTo('App\Student', 'id_thoigianbieu');
    }
}
