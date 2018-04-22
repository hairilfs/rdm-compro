<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Rdm;

use Storage, Image;

class RdmController extends Controller
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
        $this->data['rdm'] = Rdm::orderBy('sort')->get()->groupBy('grouping')->toArray();
        return view('rdm', $this->data);
    }

    public function save(Request $request)
    {
        $loop = $request->all();
        array_shift($loop); // remove _token 
        // dd($loop) ;

        $storage = Storage::disk('web');

        foreach ($loop as $key => $value) 
        {
            $rdm = Rdm::where('setting_key', $key)->first();

            if (!$rdm) continue; 

            if ($rdm->setting_type != config('extra.setting_type.file')) 
            {
                $rdm->content = $value;
                $rdm->save();
            }
            else if ($rdm->setting_type == config('extra.setting_type.file')) // file handling
            {
                if ($request->hasFile($key)) {
                    if ($rdm->content) {
                        $storage->delete("rdm/".$rdm->content);
                    }

                    $rdm->content = str_replace('.', time().'.', $request->{$key}->getClientOriginalName());
                    $rdm->file_type = $request->{$key}->getClientMimeType();
                    $rdm->size = $request->{$key}->getClientSize();

                    // uploading...
                    if (str_contains($rdm->file_type, 'image')) {
                        $image = Image::make(file_get_contents($request->{$key}));
                        if ($image->width() > 800) {
                            $image->resize(800, null, function ($constraint) {
                                $constraint->aspectRatio();
                            });
                        }
                        $image = $image->stream()->__toString();

                        $storage->put("rdm/".$rdm->content, $image);
                    }

                    $rdm->save();

                    // dd($ext);
                }
            }
        }

        return redirect('rdm')->with('success', 'Rdm saved!');
    }
}
