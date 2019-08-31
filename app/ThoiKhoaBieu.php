<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ThoiKhoaBieu extends Model
{
    protected $table = 'thoi_khoa_bieu';
    
    public function User()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
    public function ChiTietThoiKhoaBieu()
    {
        return $this->hasMany('App\ChiTietThoiKhoaBieu', 'id_thoikhoabieu');
    }
}
