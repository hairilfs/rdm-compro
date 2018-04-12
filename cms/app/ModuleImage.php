<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuleImage extends Model
{
	// public $incrementing = false;
	
    protected $table = 'module_image';
    protected $primaryKey = 'module_image_id';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getImgUrl($project_cid=null)
    {
        return env('WEB_BASE_URL')."uploads/module_image/{$project_cid}/".$this->img_url;

    }
}
