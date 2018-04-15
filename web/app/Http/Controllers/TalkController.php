<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Talk;

class TalkController extends Controller
{	
	public $data = array();

    public function save(Request $request)
    {
    	$retval = ['status' => true];
    	$talk = new Talk;
    	$talk->name = $request->input('name');
    	$talk->company = $request->input('company');
    	$talk->email = $request->input('email');
    	$talk->phone = $request->input('phone');
    	$talk->help = $request->input('help');
    	$talk->description = $request->input('description');
    	$saved = $talk->save();

    	// logic send email (later)

    	if (!$saved) {
    		$retval['status'] = false;
    	}

		return response()->json($retval);
    }
}
