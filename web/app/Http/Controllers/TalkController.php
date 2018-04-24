<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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


        if (!$saved) {
            $retval['status'] = false;
        } else {
        	// logic send email
            Mail::to($talk->email)
                ->bcc('hairilfiqri@gmail.com')
                ->send(new \App\Mail\Talk($talk->talk_id));
        }

		return response()->json($retval);
    }
}
