<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{ Contact, Slider };

class ContactController extends Controller
{   
    public $data = array();

    public function index(Request $request)
    {
        $this->data['slider'] = Slider::where('category', 'contact')->orderBy('sort')->first();
        return view('contact', $this->data);
    }

}
