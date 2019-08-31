<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address_Huyen extends Model
{
    protected $table = 'address_quanhuyen';

    
    public function Address_Tinh()
    {
        return $this->belongsTo('App\Address_Tinh', 'id_tinh');
    }
    public function Address_Xa()
    {
        return $this->hasMany('App\Address_Xa', 'id_huyen');
    }
}
