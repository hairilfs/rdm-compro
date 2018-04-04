<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{	
	public $data = array();

    public function index(Request $request)
    {
    	return view('home', $this->data);
    }
}
