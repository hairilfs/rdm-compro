<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    protected $table = 'project_category';
    protected $primaryKey = 'project_category_cid';

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
