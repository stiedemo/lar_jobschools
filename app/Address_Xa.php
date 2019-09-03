<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address_Xa extends Model
{
    protected $table = 'address_xaphuongthitran';

    
    public function Address_Huyen()
    {
        return $this->belongsTo('App\Address_Huyen', 'id_quanhuyen');
    }

}
