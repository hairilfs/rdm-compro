<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{ About, Testimony, PartnerWho, Scope, People };

class AboutController extends Controller
{	
	public $data = array();

    public function index(Request $request, $section='who')
    {
    	if ($section=='who') 
        {
    		$this->data['testimony'] = Testimony::publish()->get();
            $this->data['partner'] = PartnerWho::orderBy('sort')->take(8)->get();
            $this->data['scope'] = Scope::publish()->orderBy('published_at')->get();
	    	$this->data['people'] = People::publish()->orderBy('published_at')->get();    		
    	}
        else if($section=='what')
        {
            
        }

    	return view('company-'.$section, $this->data);
    }

}
