<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	public $incrementing = false;
	
    protected $table = 'project';
    protected $primaryKey = 'project_cid';

    protected $dates = ['created_at', 'updated_at', 'published_at'];

    public function modules()
    {
        return $this->hasMany('App\Module', 'project_cid')->orderBy('sort');
    }

    public function scopePublish($query)
    {
        return $query->where('is_publish', 1)->whereRaw('DATE(`published_at`) <= CURDATE()');
    }

    public function getImgThumbUrl($index=0)
    {
        if ($index % 7 == 0) 
        {
            $url = $this->img_portrait_url ? env('WEB_BASE_URL')."uploads/project/{$this->project_cid}/{$this->img_portrait_url}" : 'https://dummyimage.com/390x500/b8b8b8/2b2b2b.png';
        }
        else
        {
            $url = $this->img_landscape_url ? env('WEB_BASE_URL')."uploads/project/{$this->project_cid}/thumb_{$this->img_landscape_url}" : 'https://dummyimage.com/580x362/b8b8b8/2b2b2b.png';
        }

        return $url;
    }

    public function getImgUrl($orientation='landscape', $thumb=false)
    {
    	if ($orientation == 'landscape') 
    	{
            $img = $thumb ? 'thumb_'.$this->img_landscape_url : $this->img_landscape_url;
            $url = $this->img_landscape_url ? env('WEB_BASE_URL')."uploads/project/{$this->project_cid}/{$img}" : 'https://dummyimage.com/580x362/b8b8b8/2b2b2b.png';
        }
        else
        {
    		$url = $this->img_landscape_url ? env('WEB_BASE_URL')."uploads/project/{$this->project_cid}/{$this->img_portrait_url}" : 'https://dummyimage.com/580x743/b8b8b8/2b2b2b.png';

        }

    	return $url;
    }

    public function getUrl()
    {
        return url('/project/'.$this->slug.'-'.$this->project_cid);
    }

    public function getYoutubeId()
    {
        preg_match("/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user)\/))([^\?&\"'>]+)/", $this->youtube_url, $matches);
        return $matches[1];
    }
}
