<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{ About };

use Storage, Image;

class AboutWhyController extends Controller
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
     * Swhy the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $section='who')
    {
        $this->data['about'] = About::where('section', $section)->orderBy('sort', 'asc')->get();
        $this->data['section'] = $section;

        return view('about', $this->data);
    } 

    public function save(Request $request, $section='who')
    {
        $loop = $request->all();
        array_shift($loop); // remove _token 

        $storage = Storage::disk('web');

        foreach ($loop as $key => $value) 
        {
            $about = About::where([
                ['setting_key', $key],
                ['section', $section]
            ])
            ->first();

            if (!$about) continue; 

            if ($about->setting_type != config('extra.setting_type.file')) 
            {
                $about->content = $value;
                $about->save();
            }
            else if ($about->setting_type == config('extra.setting_type.file')) // file handling
            {
                if ($request->hasFile($key)) {

                    if ($about->content) {
                        $storage->delete("about/".$about->content);
                    } 

                    $about->content = str_replace('.', time().'.', $request->{$key}->getClientOriginalName());
                    $about->file_type = $request->{$key}->getClientMimeType();

                    // uploading...
                    if (str_contains($about->file_type, 'image')) {
                        $image = Image::make(file_get_contents($request->{$key}));

                        if($section=='why-hero')
                        {
                            if ($image->width() > 1280) {
                                $image->resize(1280, null, function ($constraint) {
                                    $constraint->aspectRatio();
                                });
                            }

                        }
                        if($section=='why-content')
                        {
                            if ($image->width() > 600) {
                                $image->resize(600, null, function ($constraint) {
                                    $constraint->aspectRatio();
                                });
                            }

                        }

                        $about->size = (int)$image->filesize();
                        $image = $image->stream()->__toString();
                        $storage->put("about/".$about->content, $image);
                    }

                    $about->save();

                    // dd($ext);
                }
            }
        }

        return redirect('about/'.$section)->with('success', 'About saved!');
    }
    
    public function showContent(Request $request)
    {
        $this->data['about'] = About::where('section', 'why-content')->orderBy('sort')->get()->groupBy('grouping')->toArray();
        $this->data['section'] = 'why-content';

        return view('about-why', $this->data);
    } 
}
