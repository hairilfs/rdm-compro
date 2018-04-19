<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{ About, Testimony, People, Scope };

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
        return view("about-who", $this->data);
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
                    $about->size = $request->{$key}->getClientSize();

                    // uploading...
                    if (str_contains($about->file_type, 'image')) {
                        $image = Image::make(file_get_contents($request->{$key}));

                        if ($section=='who-address') {
                            $image->fit(580, 362, function ($constraint) {
                                $constraint->upsize();
                            });
                        }

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

    /*
    |--------------------------------------------------------------------------
    | About - Who (Scope)
    |--------------------------------------------------------------------------
    */

    public function scope(Request $request)
    {
        return view("scope", $this->data);
    } 

    public function scopeDatatables(Request $request)
    {
        return DataTables::of(Scope::query())
            ->addColumn('action', function ($data) {
                $btn_action  = '<div class="btn-group">';
                $btn_action .=      '<a href="'.url('about/who-scope/form/'.$data->scope_id).'" class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit scope"><i class="fa fa-pencil"></i></a>';
                $btn_action .=      '<button class="btn btn-xs btn-danger" type="button" data-toggle="tooltip" title="Remove scope" onclick="return deletePopup('.$data->scope_id.');"><i class="fa fa-times"></i></button>';
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

    public function showScope(Request $request, $id='')
    {
        $this->data['scope'] = $id ? Scope::find($id) : new Scope;
        return view('scope-form', $this->data);
    }

    public function saveScope(Request $request, $id="")
    {
        // dd($request->all());
        $scope = $id ? Scope::find($id) : new Scope;
        $scope->title = $request->input('title');
        $scope->description = $request->input('description');
        $scope->link_text = $request->input('link_text');
        $scope->link_url = $request->input('link_url');
        $scope->published_at = date('Y-m-d H:i:s', strtotime($request->input('published_at')));
        $scope->is_publish = $request->input('is_publish') ? 1 : 0;

        $storage = Storage::disk('web');

        if ($request->hasFile('image')) 
        {
            if ($scope->img_url) {
                $storage->delete("scope/".$scope->img_url);
            }

            $img_temp = $request->file('image');
            $file_type = $img_temp->getClientMimeType();

            $scope->img_url = str_replace('.', time().'.', $img_temp->getClientOriginalName());
            if (str_contains($file_type, 'image')) {
                $image = Image::make(file_get_contents($img_temp));
                $image->fit(373, 556, function ($constraint) {
                    $constraint->upsize();
                });
                $image = $image->stream()->__toString();

                $storage->put("scope/".$scope->img_url, $image);
            }
        }

        $scope->save();        

        return redirect('/about/who-scope/form/'.$scope->scope_id)->with('success', $id ? 'Scope updated!' : 'Scope saved!');
    }

    public function deleteScope(Request $request, $id='')
    {
        if (!$id) return redirect('/about/who-scope/');

        $scope = Scope::find($id);
        if (count($scope)) {
            $storage = Storage::disk('web');
            
            if ($scope->img_url) {
                $storage->delete("scope/".$scope->img_url);
            }

            $scope->delete();
            return redirect('/about/who-scope/')->with('success', 'Scope deleted!');
        } else {
            return redirect('/about/who-scope/')->with('fail', 'Scope not found!');

        }
    }

     /*
    |--------------------------------------------------------------------------
    | About - Who (Testimony)
    |--------------------------------------------------------------------------
    */

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

    public function deleteTestimony(Request $request, $id='')
    {
        if (!$id) return redirect('/about/who-testimony/');

        $testimony = Testimony::find($id);
        if (count($testimony)) {
            $storage = Storage::disk('web');
            
            if ($testimony->img_url) {
                $storage->delete("testimony/".$testimony->img_url);
            }

            $testimony->delete();
            return redirect('/about/who-testimony/')->with('success', 'Testimony deleted!');
        } else {
            return redirect('/about/who-testimony/')->with('fail', 'Testimony not found!');

        }
    }

    /*
    |--------------------------------------------------------------------------
    | About - Who (Peolple & Culture)
    |--------------------------------------------------------------------------
    */

    public function people(Request $request)
    {
        return view("people", $this->data);
    } 

    public function peopleDatatables(Request $request)
    {
        return DataTables::of(People::query())
            ->addColumn('action', function ($data) {
                $btn_action  = '<div class="btn-group">';
                $btn_action .=      '<a href="'.url('about/who-people/form/'.$data->people_id).'" class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit people"><i class="fa fa-pencil"></i></a>';
                $btn_action .=      '<button class="btn btn-xs btn-danger" type="button" data-toggle="tooltip" title="Remove people" onclick="return deletePopup('.$data->people_id.');"><i class="fa fa-times"></i></button>';
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

    public function showPeople(Request $request, $id='')
    {
        $this->data['people'] = $id ? People::find($id) : new People;
        return view('people-form', $this->data);
    }

    public function savePeople(Request $request, $id="")
    {
        // dd($request->all());
        $people = $id ? People::find($id) : new People;
        $people->name = $request->input('name');
        $people->position = $request->input('position');    
        $people->published_at = date('Y-m-d H:i:s', strtotime($request->input('published_at')));
        $people->is_publish = $request->input('is_publish') ? 1 : 0;

        $storage = Storage::disk('web');

        if ($request->hasFile('image')) 
        {
            if ($people->img_url) {
                $storage->delete("people/".$people->img_url);
            }

            $img_temp = $request->file('image');
            $file_type = $img_temp->getClientMimeType();

            $people->img_url = str_replace('.', time().'.', $img_temp->getClientOriginalName());
            if (str_contains($file_type, 'image')) {
                $image = Image::make(file_get_contents($img_temp));
                $image->fit(370, 370, function ($constraint) {
                    $constraint->upsize();
                });
                $image = $image->stream()->__toString();

                $storage->put("people/".$people->img_url, $image);
            }
        }

        $people->save();        

        return redirect('/about/who-people/form/'.$people->people_id)->with('success', $id ? 'People updated!' : 'People saved!');
    }

    public function deletePeople(Request $request, $id='')
    {
        if (!$id) return redirect('/about/who-people/');

        $people = People::find($id);
        if (count($people)) {
            $storage = Storage::disk('web');
            
            if ($people->img_url) {
                $storage->delete("people/".$people->img_url);
            }

            $people->delete();
            return redirect('/about/who-people/')->with('success', 'People deleted!');
        } else {
            return redirect('/about/who-people/')->with('fail', 'People not found!');

        }
    }
}
