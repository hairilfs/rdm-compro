<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    protected $table = 'testimony';
    protected $primaryKey = 'testimony_id';

    protected $dates = ['created_at', 'updated_at', 'published_at'];

    public function getImgUrl()
    {
		return $this->img_url ? env('WEB_BASE_URL')."uploads/testimony/{$this->img_url}" : 'https://dummyimage.com/370x370/b8b8b8/2b2b2b.png';
    }

    public function scopePublish($query)
    {
        return $query->where('is_publish', 1)->whereRaw('DATE(`published_at`) <= CURDATE()');
    }

}
