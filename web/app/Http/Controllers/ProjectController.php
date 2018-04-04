<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProjectController extends Controller
{	
	public $data = array();

    public function index(Request $request)
    {
    	return view('projects', $this->data);
    }
}
