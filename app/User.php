<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $connection = 'tdh_user';
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'fname',
        'mname',
        'lname',
        'username',
        'password',
        'designation',
        'division',
        'section',
        'user_priv'
    ];
//    /**
//     * The attributes that are mass assignable.
//     *
//     * @var array
//     */
//    protected $fillable = [
//        'name', 'username','email', 'password',
//    ];
//
//    /**
//     * The attributes that should be hidden for arrays.
//     *
//     * @var array
//     */
//    protected $hidden = [
//        'password', 'remember_token',
//    ];
    
}
