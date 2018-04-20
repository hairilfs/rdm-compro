<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartnerWho extends Model
{
    protected $table = 'partner_who';
    protected $primaryKey = 'partner_who_id';

    protected $dates = ['created_at', 'updated_at'];

    public function getImgUrl($mobile='')
    {
    	if (!$this->img_url) { return 'https://dummyimage.com/580x362/b8b8b8/2b2b2b.png'; }

    	if ($mobile) {
    		$url = env('WEB_BASE_URL')."uploads/partner_who/mobile_{$this->img_url}";
    	} else {
    		$url = env('WEB_BASE_URL')."uploads/partner_who/{$this->img_url}";    		
    	}

		return $url;
    }
}
