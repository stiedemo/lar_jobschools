<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function SoHop()
    {
        return $this->hasMany('App\SoHop', 'id_user');
    }
    public function Student()
    {
        return $this->hasMany('App\Student', 'id_user');
    }
    public function Quy()
    {
        return $this->hasMany('App\Quy', 'id_user');
    }
    public function ThoiKhoaBieu()
    {
        return $this->hasMany('App\ThoiKhoaBieu', 'id_user');
    }
}
