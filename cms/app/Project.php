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

    public function getImgUrl($type='landscape')
    {
        switch ($type) {
            case 'landscape':
                if ($this->img_landscape_url) {
                    $url = env('WEB_BASE_URL')."uploads/project/{$this->project_cid}/{$this->img_landscape_url}";
                } else {
                    $url = 'http://via.placeholder.com/100x150?text=Upload+image';
                }

                break;
            
            default:                
                if ($this->img_portrait_url) {
                    $url = env('WEB_BASE_URL')."uploads/project/{$this->project_cid}/{$this->img_portrait_url}";
                } else {
                    $url = 'http://via.placeholder.com/150x100?text=Upload+image';
                }
                break;
        }

        return $url;
    }
}
