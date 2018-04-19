<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{ About, Testimony };

class AboutController extends Controller
{	
	public $data = array();

    public function index(Request $request, $section='who')
    {
    	if ($section=='who') {
    		$this->data['testimony'] = Testimony::publish()->get();
    	}

    	return view('company-'.$section, $this->data);
    }

}
