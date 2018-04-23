<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
	public $incrementing = true;
	
    protected $table = 'talk';
    protected $primaryKey = 'talk_id';

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function getSubmit()
    {
    	return $this->created_at ? $this->created_at->format('m/d/Y H:i A') : date('m/d/Y H:i A');
    }
   
}
