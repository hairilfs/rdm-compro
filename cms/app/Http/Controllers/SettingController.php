<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Setting;

use Storage, Image;

class SettingController extends Controller
{
    /**
     * Create global variable.
     */

    var $data = array();

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['setting'] = Setting::orderBy('sort')->get()->groupBy('section')->toArray();
        return view('setting', $this->data);
    }

    public function save(Request $request)
    {
        $loop = $request->all();
        array_shift($loop); // remove _token 
        // dd($loop) ;

        $storage = Storage::disk('web');

        foreach ($loop as $key => $value) 
        {
            $setting = Setting::where('setting_key', $key)->first();

            if (!$setting) continue; 

            if ($setting->setting_type != config('extra.setting_type.file')) 
            {
                $setting->content = $value;
                $setting->save();
            }
            else if ($setting->setting_type == config('extra.setting_type.file')) // file handling
            {
                if ($request->hasFile($key)) {

                    $setting->content = $request->{$key}->getClientOriginalName();
                    $setting->file_type = $request->{$key}->getClientMimeType();
                    $setting->size = $request->{$key}->getClientSize();

                    // uploading...
                    if (str_contains($setting->file_type, 'image')) {
                        $image = Image::make(file_get_contents($request->{$key}));
                        $image = $image->stream()->__toString();

                        $storage->put("setting/{$key}/".$setting->content, $image);
                    }

                    $setting->save();

                    // dd($ext);
                }
            }
        }

        return redirect('setting')->with('success', 'Setting saved!');
    }
}
