<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{ Slider, Project };

class HomeController extends Controller
{	
	public $data = array();

    public function index(Request $request)
    {
    	$this->data['slider'] = Slider::where('category', 'home')->orderBy('sort')->get();
    	$this->data['project'] = Project::publish()->take(3)->get();
    	return view('home', $this->data);
    }
}
