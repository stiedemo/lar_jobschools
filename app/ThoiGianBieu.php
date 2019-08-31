<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThoiGianBieu extends Model
{
    protected $table = 'thoi_gian_bieu';

    public function PhanCongKeHoach()
    {
        return $this->belongsTo('App\PhanCongKeHoach', 'id_kehoach');
    }
    public function ChiTietThoiKhoaBieu()
    {
        return $this->belongsTo('App\ChiTietThoiKhoaBieu', 'id_thoikhoabieu');
    }
}
