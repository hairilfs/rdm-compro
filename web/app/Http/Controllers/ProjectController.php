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

    public function show(Request $request, $slug=null)
    {
    	$cid = $this->getCidFromSlug($slug);
        $this->data['project'] = Project::find($cid);
    	$this->data['other'] = Project::where('project_id', '>', $this->data['project']->project_id)
            ->orWhere('project_id', '<', $this->data['project']->project_id)
            ->first();
    	return view('project-detail', $this->data);
    }
}
