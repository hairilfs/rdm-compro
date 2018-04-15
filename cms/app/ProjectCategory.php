<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
	public $incrementing = false;
	
    protected $table = 'project_category';
    protected $primaryKey = 'project_category_cid';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function deleteProjectToo($)
    {
    	$project = Project::where('project_category', 'like', '%'.$this->slug.'%')->get();

    	foreach ($project as $value) 
    	{
    		$categories = explode(',', $value->project_category);
    		$index = array_search($this->slug, $categories);
    		if($index) { 
    			unset($categories[$index]); 

	    		$value->project_category = $categories ? implode(',', $categories) : null;
				$value->save();
    		}

    	}

    }

}
