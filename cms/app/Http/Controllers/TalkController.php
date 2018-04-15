<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Talk;
use DataTables, Storage, Image;

class TalkController extends Controller
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
    public function index(Request $request)
    {
        return view('talk', $this->data);
    }

    public function datatables(Request $request)
    {
        return DataTables::of(Talk::query())
            ->addColumn('action', function ($data) {
                $btn_action  = '<div class="btn-group">';
                $btn_action .=      '<a href="'.url('talk/form/'.$data->talk_id).'" class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit talk"><i class="fa fa-pencil"></i></a>';
                $btn_action .= '</div>';

                return $btn_action;
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->toJson();

    }

    public function show(Request $request, $id="")
    {
        $this->data['talk'] = $id ? Talk::find($id) : new Talk;
        return view('talk-form', $this->data);
    }

    /*public function save(Request $request, $id="")
    {
        // dd($request->all());
        $talk = $id ? Talk::find($id) : new Talk;
        if(!$id) $talk->talk_id = str_random(5);

        $talk->title = $request->input('title');
        $talk->slug = str_slug($request->input('title'));
        $talk->excerpt = $request->input('excerpt');
        $talk->description = $request->input('description');
        $talk->partner = $request->input('partner');
        $talk->talk_status = $request->input('talk_status');
        $talk->year = $request->input('year');
        $talk->youtube_url = $request->input('youtube_url');
        $talk->talk_category = implode(',', $request->input('talk_category'));
        $talk->published_at = date('Y-m-d H:i:s', strtotime($request->input('published_at')));
        $talk->is_publish = $request->input('is_publish') ? 1 : 0;

        $storage = Storage::disk('web');

        if ($request->hasFile('img_portrait')) 
        {
            $portrait_temp = $request->file('img_portrait');
            $file_type = $portrait_temp->getClientMimeType();

            $talk->img_portrait_url = str_replace('.', time().'.', $portrait_temp->getClientOriginalName());
            if (str_contains($file_type, 'image')) {
                $image = Image::make(file_get_contents($portrait_temp));
                $image->fit(580, 743, function ($constraint) {
                    $constraint->upsize();
                });
                $image = $image->stream()->__toString();

                $storage->put("talk/{$talk->talk_id}/".$talk->img_portrait_url, $image);
            }
        }

        if ($request->hasFile('img_landscape')) 
        {
            $landscape_temp = $request->file('img_landscape');
            $file_type = $landscape_temp->getClientMimeType();

            $talk->img_landscape_url = str_replace('.', time().'.', $landscape_temp->getClientOriginalName());
            if (str_contains($file_type, 'image')) {
                $image = Image::make(file_get_contents($landscape_temp));
                $image->fit(580, 362, function ($constraint) {
                    $constraint->upsize();
                });
                $image = $image->stream()->__toString();

                $storage->put("talk/{$talk->talk_id}/".$talk->img_landscape_url, $image);
            }
        }

        $talk->save();        

        return redirect('/talk/form/'.$talk->talk_id)->with('success', $id ? 'Talk updated!' : 'Talk saved!');
    }

    public function list(Request $request)
    {
        $list = Talk::orderBy('sort')->get();
        return response()->json($list);
    }

    public function sort(Request $request)
    {
        $counter = 0;
        foreach ($request->input('sorting') as $value) {
            $talk_category = Talk::find($value['talk_category_id']);
            $talk_category->sort = $value['sort'];
            $talk_category->save();
            $counter++;
        }

        return response()->json([
            'counter' => $counter
        ]);
    }

    public function delete(Request $request, $id='')
    {
        if (!$id) return redirect('talk-category');

        $talk_category = Talk::find($id);
        if (count($talk_category)) {
            $talk_category->delete();
            return redirect('talk-category')->with('success', 'Category deleted!');
        } else {
            return redirect('talk-category')->with('fail', 'Category not found!');

        }
    }*/
}
