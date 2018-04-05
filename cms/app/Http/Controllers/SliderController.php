<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slider;

use Storage, Image;

class SliderController extends Controller
{
    /**
     * Create global variable.
     */

    public $data = array();

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
    public function index(Request $request, $category='home')
    {
        $this->data['category'] = title_case($category);
        return view('slider', $this->data);
    }

    public function save(Request $request)
    {
        $loop = $request->all();
        array_shift($loop); // remove _token 
        // dd($loop) ;

        $storage = Storage::disk('public');

        foreach ($loop as $key => $value) 
        {
            $slider = Slider::where('slider_key', $key)->first();

            if (!$slider) continue; 

            if ($slider->slider_type != config('extra.slider_type.file')) 
            {
                $slider->content = $value;
                $slider->save();
            }
            else if ($slider->slider_type == config('extra.slider_type.file')) // file handling
            {
                if ($request->hasFile($key)) {

                    $slider->content = $request->{$key}->getClientOriginalName();
                    $slider->file_type = $request->{$key}->getClientMimeType();
                    $slider->size = $request->{$key}->getClientSize();

                    // uploading...
                    if (str_contains($slider->file_type, 'image')) {
                        $image = Image::make(file_get_contents($request->{$key}));
                        $image = $image->stream()->__toString();

                        $storage->put("slider/{$key}/".$slider->content, $image);
                    }

                    $slider->save();

                    // dd($ext);
                }
            }
        }

        return redirect('slider')->with('success', 'Slider saved!');
    }
}
