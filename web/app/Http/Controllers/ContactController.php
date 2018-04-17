<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Contact;

class ContactController extends Controller
{   
    public $data = array();

    public function index(Request $request)
    {
        return view('contact', $this->data);
    }

}
