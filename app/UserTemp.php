<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTemp extends Model
{
    protected $table = 'user_temp';
    protected $fillable = ['fname','mname','lname','designation','division','section','username','password','user_id'];
}
