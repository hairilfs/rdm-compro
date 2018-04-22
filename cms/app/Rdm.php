<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rdm extends Model
{
    protected $table = 'rdm';
    protected $primaryKey = 'rdm_id';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getImgUrl()
    {
    	return env('WEB_BASE_URL')."uploads/rdm/{$this->img_url}";
    }
}
