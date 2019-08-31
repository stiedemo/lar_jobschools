<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address_Tinh extends Model
{
    protected $table = 'address_tinhthanhpho';

    public function Address_Huyen()
    {
        return $this->hasMany('App\Address_Huyen', 'id_tinh');
    }

}
