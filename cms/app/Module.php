<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
	// public $incrementing = false;
	
    protected $table = 'module';
    protected $primaryKey = 'module_id';

    protected $dates = [
        'created_at',
        'updated_at',
        'published_at',
    ];

    public function images()
    {
        return $this->hasMany('App\ModuleImage', 'module_id')->orderBy('sort');
    }

    public function getPublish()
    {
    	return $this->published_at ? $this->published_at->format('m/d/Y H:i A') : date('m/d/Y H:i A');
    }

    public function getImgUrl($order=0)
    {
        $images = $this->images;
        if ($images->count() <= 0) {
            return 'http://via.placeholder.com/300x200?text=Upload+image';
        }

        return $images[$order]->getImgUrl($this->project_cid);

    }
    public function getImgId($order=0)
    {
        $images = $this->images;
        if ($images->count()) {
            return $images[$order]->module_image_id;
        }

        return 'false';
    }
}
