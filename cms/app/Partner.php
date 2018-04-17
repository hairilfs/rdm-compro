<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partner';
    protected $primaryKey = 'partner_id';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getImgUrl()
    {
    	return env('WEB_BASE_URL')."uploads/partner/{$this->img_url}";
    }
}
