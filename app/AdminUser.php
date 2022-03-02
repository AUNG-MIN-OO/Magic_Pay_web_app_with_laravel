<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class AdminUser extends Authenticatable
{
    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $table = "admin_users";

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];
}
