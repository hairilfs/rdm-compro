<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{ Project, Slider };

class ProjectController extends Controller
{   
    public $data = array();

    public function ongoing(Request $request)
    {
        return view('project-ongoing', $this->data);
    }

    public function index(Request $request)
    {
        $this->data['slider'] = Slider::where('category', 'projects')->orderBy('sort')->first();
        $this->data['projects'] = Project::publish()->orderBy('sort')->get();
        return view('projects', $this->data);
    }

    public function show(Request $request, $slug=null)
    {
        $cid = $this->getCidFromSlug($slug);
        $this->data['project'] = Project::find($cid);
        $this->data['other'] = Project::where('sort', (int)$this->data['project']->sort + 1)->first();
        if ( !count($this->data['other']) ) {
            $this->data['other'] = Project::where('sort', 1)->first();
        }
        return view('project-detail', $this->data);
    }
}
