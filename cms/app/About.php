<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $table = 'about';
    protected $primaryKey = 'about_id';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getImgUrl()
    {
    	return env('WEB_BASE_URL')."uploads/about/{$this->img_url}";
    }
}
