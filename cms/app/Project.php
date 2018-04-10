<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	public $incrementing = false;
	
    protected $table = 'project';
    protected $primaryKey = 'project_cid';

    protected $dates = [
        'created_at',
        'updated_at',
        'published_at',
    ];

    public function getPublish()
    {
    	return $this->published_at ? $this->published_at->format('m/d/Y H:i A') : date('m/d/Y H:i A');
    }
}
