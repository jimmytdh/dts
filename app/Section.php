<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $connection = 'tdh_user';
    protected $table = 'section';
    protected $primaryKey = 'id';
}
