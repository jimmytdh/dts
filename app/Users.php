<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
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
}
