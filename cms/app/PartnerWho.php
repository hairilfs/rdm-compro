<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerWho extends Model
{
    protected $table = 'partner_who';
    protected $primaryKey = 'partner_who_id';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getImgUrl()
    {
    	return env('WEB_BASE_URL')."uploads/partner_who/{$this->img_url}";
    }
}
