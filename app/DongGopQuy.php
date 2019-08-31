<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DongGopQuy extends Model
{
    protected $table = 'dong_gop_quy';

        
    public function Student()
    {
        return $this->belongsTo('App\Student', 'id_student');
    }
    public function Quy()
    {
        return $this->belongsTo('App\Quy', 'id_quy');
    }
}
