<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    protected $table = 'talk';
    protected $primaryKey = 'talk_id';

    protected $dates = ['created_at', 'updated_at'];
}
