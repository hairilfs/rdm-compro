<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\About;

class AboutController extends Controller
{	
	public $data = array();

    public function index(Request $request, $section='who')
    {
    	return view('company-'.$section, $this->data);
    }

}
