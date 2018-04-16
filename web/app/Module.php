<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use View;

class Module extends Model
{
    protected $table = 'module';
    protected $primaryKey = 'module_id';

    protected $dates = ['created_at', 'updated_at'];

    public function images()
    {
        return $this->hasMany('App\ModuleImage', 'module_id')->orderBy('sort');
    }

    public function toHtml()
    {
    	switch ($this->module_type) {
    		case config('extra.module_type.text'):
    			$html = View::make('modules.text', $this)->render();
    			break;

    		case config('extra.module_type.image'):
                $html = View::make('modules.image', [
                    'data' => $this,
                    'image' => $this->images[0]
                ])->render();
                break;

            case config('extra.module_type.images'):
                $html = View::make('modules.images', [
                    'data' => $this,
                    'image' => $this->images
                ])->render();
                break;

            case config('extra.module_type.text_image'):
                $html = View::make('modules.text_image', [
                    'data' => $this,
                    'image' => $this->images[0]
                ])->render();
    			break;

    		default:
    			$html = '';
    			break;
    	}

    	return $html;
    }
}
