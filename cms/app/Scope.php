<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scope extends Model
{
	public $incrementing = true;
	
    protected $table = 'scope';
    protected $primaryKey = 'scope_id';

    protected $dates = [
        'created_at',
        'updated_at',
        'published_at',
    ];

    public function getPublish()
    {
    	return $this->published_at ? $this->published_at->format('m/d/Y H:i A') : date('m/d/Y H:i A');
    }

    public function getImgUrl()
    {
        if ($this->img_url) {
            $url = env('WEB_BASE_URL')."uploads/scope/{$this->img_url}";
        } else {
            $url = 'http://via.placeholder.com/200x200?text=Upload+image';
        }

        return $url;
    }
}
