<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\About;

class AboutController extends Controller
{	
	public $data = array();

    public function index(Request $request)
    {
    	return view('about', $this->data);
    }

}