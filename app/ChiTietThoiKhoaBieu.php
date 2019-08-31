<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietThoiKhoaBieu extends Model
{
    protected $table = 'chi_tiet_thoi_khoa_bieu';

    public function ThoiGianBieu()
    {
        return $this->hasMany('App\ThoiGianBieu', 'id_thoigianbieu');
    }
    public function ThoiKhoaBieu()
    {
        return $this->belongsTo('App\ThoiKhoaBieu', 'id_thoikhoabieu');
    }
}
