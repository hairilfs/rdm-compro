<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{ Slider, Project, Partner };
use Newsletter;

class HomeController extends Controller
{	
	public $data = array();

    public function index(Request $request)
    {
    	$this->data['slider'] = Slider::where('category', 'home')->orderBy('sort')->get();
    	$this->data['partner'] = Partner::orderBy('sort')->take(8)->get();
    	$this->data['project'] = Project::publish()->take(3)->get();
    	return view('home', $this->data);
    }

    public function subscribe(Request $request)
    {
    	$validatedData = $request->validate([
	        'email' => 'required|email',
	    ]);

	    $subs = Newsletter::subscribe($request->input('email'));
	    return redirect('/#home-subscribe')->with('success','Thanks for Subscribing!');

    }
}
