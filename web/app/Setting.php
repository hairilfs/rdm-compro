<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'setting';
    protected $primaryKey = 'id';

    protected $dates = ['created_at', 'updated_at'];

    public function getContent()
    {
        if ($this->setting_type != config('extra.setting_type.file')) 
        {
            return $this->content;
        }
        else 
        {
            return $this->getImgUrl();

        }
    }

    public function getImgUrl($mobile='')
    {
    	if (!$this->content) { return 'https://dummyimage.com/580x362/b8b8b8/2b2b2b.png'; }
		return env('WEB_BASE_URL')."uploads/setting/{$this->setting_key}/{$this->content}";
    }
}
