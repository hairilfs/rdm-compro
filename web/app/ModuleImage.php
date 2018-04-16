<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModuleImage extends Model
{
    protected $table = 'module_image';
    protected $primaryKey = 'module_image_id';

    protected $dates = ['created_at', 'updated_at'];

    public function getImgUrl($project_cid=null)
    {
		return $this->img_url ? env('WEB_BASE_URL')."uploads/module_image/{$project_cid}/{$this->img_url}" : 'https://dummyimage.com/580x362/b8b8b8/2b2b2b.png';
    }

}
