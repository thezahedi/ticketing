<?php

namespace App;

use Illuminate\Foundation\Auth\User as UserModel;

class User extends UserModel
{
    protected $guarded = [];
    protected $hidden = [
        'password',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
}
