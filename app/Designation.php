<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $connection = 'tdh_user';
    protected $table = 'designation';
    protected $primaryKey = 'id';
}
