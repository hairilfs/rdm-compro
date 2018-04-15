<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Project;

class ProjectController extends Controller
{	
	public $data = array();

    public function index(Request $request)
    {
    	$this->data['projects'] = Project::publish()->get();
    	return view('projects', $this->data);
    }
}
