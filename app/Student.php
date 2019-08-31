<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    public function DiemDanh()
    {
        return $this->hasMany('App\DiemDanh', 'id_student');
    }
    public function SuDungQuy()
    {
        return $this->hasMany('App\SuDungQuy', 'id_student');
    }
    public function PhanCongKeHoach()
    {
        return $this->hasMany('App\PhanCongKeHoach', 'id_student');
    }
    public function DongGopQuy()
    {
        return $this->hasMany('App\DongGopQuy', 'id_student');
    }
    public function User()
    {
        return $this->belongsTo('App\User', 'id_user');
    }
    public function Address()
    {
        return $this->belongsTo('App\Address_Tinh', 'id_address');
    }
}
