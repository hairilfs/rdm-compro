<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{ About, Testimony };

use Storage, Image, DataTables;

class AboutController extends Controller
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
    public function index(Request $request, $section='who')
    {
        $this->data['about'] = About::where('section', $section)->orderBy('sort')->get();
        $this->data['section'] = $section;
        return view('about', $this->data);
    }

    public function intro(Request $request, $section='who')
    {
        $this->data['about'] = About::where('section', $section)->orderBy('sort')->get();
        $this->data['section'] = $section;
        return view("about-{$section}-intro", $this->data);
    }    

    public function save(Request $request, $section='who')
    {
        $loop = $request->all();
        array_shift($loop); // remove _token 
        // dd($loop) ;

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

                    $about->content = $request->{$key}->getClientOriginalName();
                    $about->file_type = $request->{$key}->getClientMimeType();
                    $about->size = $request->{$key}->getClientSize();

                    // uploading...
                    if (str_contains($about->file_type, 'image')) {
                        $image = Image::make(file_get_contents($request->{$key}));
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

    public function testimony(Request $request)
    {
        return view("testimony", $this->data);
    } 

    public function testimonyDatatables(Request $request)
    {
        return DataTables::of(Testimony::query())
            ->addColumn('action', function ($data) {
                $btn_action  = '<div class="btn-group">';
                $btn_action .=      '<a href="'.url('about/who-testimony/form/'.$data->testimony_id).'" class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit testimony"><i class="fa fa-pencil"></i></a>';
                $btn_action .=      '<button class="btn btn-xs btn-danger" type="button" data-toggle="tooltip" title="Remove testimony" onclick="return deletePopup('.$data->testimony_id.');"><i class="fa fa-times"></i></button>';
                $btn_action .= '</div>';

                return $btn_action;
            })
            ->editColumn('is_publish', function ($data){
                return $data->is_publish ? '<span class="label label-success">Published</span>' : '<span class="label label-warning">Unpublished</span>';
            })
            ->addIndexColumn()
            ->rawColumns(['is_publish', 'action'])
            ->toJson();

    }

    public function showTestimony(Request $request, $id='')
    {
        $this->data['testimony'] = $id ? Testimony::find($id) : new Testimony;
        return view('testimony-form', $this->data);
    }

    public function saveTestimony(Request $request, $id="")
    {
        // dd($request->all());
        $testimony = $id ? Testimony::find($id) : new Testimony;
        $testimony->name = $request->input('name');
        $testimony->position = $request->input('position');
        $testimony->testimony = $request->input('testimony');
        $testimony->published_at = date('Y-m-d H:i:s', strtotime($request->input('published_at')));
        $testimony->is_publish = $request->input('is_publish') ? 1 : 0;

        $storage = Storage::disk('web');

        if ($request->hasFile('image')) 
        {
            if ($testimony->img_url) {
                $storage->delete("testimony/".$testimony->img_url);
            }

            $img_temp = $request->file('image');
            $file_type = $img_temp->getClientMimeType();

            $testimony->img_url = str_replace('.', time().'.', $img_temp->getClientOriginalName());
            if (str_contains($file_type, 'image')) {
                $image = Image::make(file_get_contents($img_temp));
                $image->fit(370, 370, function ($constraint) {
                    $constraint->upsize();
                });
                $image = $image->stream()->__toString();

                $storage->put("testimony/".$testimony->img_url, $image);
            }
        }

        $testimony->save();        

        return redirect('/about/who-testimony/form/'.$testimony->testimony_id)->with('success', $id ? 'Testimony updated!' : 'Testimony saved!');
    }
}
