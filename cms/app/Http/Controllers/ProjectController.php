<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{ Project, ProjectCategory };
use DataTables, Storage, Image;

class ProjectController extends Controller
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
        return view('project', $this->data);
    }

    public function datatables(Request $request)
    {
        return DataTables::of(Project::query())
            ->addColumn('action', function ($data) {
                $btn_action  = '<div class="btn-group">';
                $btn_action .=      '<a href="'.url('project/form/'.$data->project_cid).'" class="btn btn-xs btn-primary" data-toggle="tooltip" title="Edit project"><i class="fa fa-pencil"></i></a>';
                $btn_action .=      '<button class="btn btn-xs btn-danger" type="button" data-toggle="tooltip" title="Remove project" onclick="return deletePopup('.$data->project_cid.');"><i class="fa fa-times"></i></button>';
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

    public function show(Request $request, $cid="")
    {
        $this->data['project'] = $cid ? Project::find($cid) : new Project;
        $this->data['category'] = ProjectCategory::all();
        return view('project-form', $this->data);
    }

    public function save(Request $request, $cid="")
    {
        // dd($request->all());
        $project = $cid ? Project::find($cid) : new Project;
        if(!$cid) $project->project_cid = str_random(5);

        $project->title = $request->input('title');
        $project->slug = str_slug($request->input('title'));
        $project->excerpt = $request->input('excerpt');
        $project->description = $request->input('description');
        $project->partner = $request->input('partner');
        $project->project_status = $request->input('project_status');
        $project->year = $request->input('year');
        $project->youtube_url = $request->input('youtube_url');
        $project->project_category = implode(',', $request->input('project_category'));
        $project->published_at = date('Y-m-d H:i:s', strtotime($request->input('published_at')));
        $project->is_publish = $request->input('is_publish') ? 1 : 0;

        $storage = Storage::disk('web');

        if ($request->hasFile('img_portrait')) 
        {
            if ($project->img_portrait_url) {
                $storage->delete("project/{$project->project_cid}/".$project->img_portrait_url);
            }

            $portrait_temp = $request->file('img_portrait');
            $file_type = $portrait_temp->getClientMimeType();

            $project->img_portrait_url = str_replace('.', time().'.', $portrait_temp->getClientOriginalName());
            if (str_contains($file_type, 'image')) {
                $image = Image::make(file_get_contents($portrait_temp));
                $image->fit(580, 743, function ($constraint) {
                    $constraint->upsize();
                });
                $image = $image->stream()->__toString();

                $storage->put("project/{$project->project_cid}/".$project->img_portrait_url, $image);
            }
        }

        if ($request->hasFile('img_landscape')) 
        {
            if ($project->img_landscape_url) {
                $storage->delete("project/{$project->project_cid}/".$project->img_landscape_url);
                $storage->delete("project/{$project->project_cid}/thumb_".$project->img_landscape_url);
            }

            $landscape_temp = $request->file('img_landscape');
            $file_type = $landscape_temp->getClientMimeType();

            $project->img_landscape_url = str_replace('.', time().'.', $landscape_temp->getClientOriginalName());
            if (str_contains($file_type, 'image')) {
                $image = Image::make(file_get_contents($landscape_temp));
                $image = $image->stream()->__toString();
                $storage->put("project/{$project->project_cid}/".$project->img_landscape_url, $image);

                // thumb
                $thumb = Image::make(file_get_contents($landscape_temp));
                $thumb->fit(580, 362, function ($constraint) {
                    $constraint->upsize();
                });
                $thumb = $thumb->stream()->__toString();

                $storage->put("project/{$project->project_cid}/thumb_".$project->img_landscape_url, $thumb);
            }
        }

        $project->save();        

        return redirect('/project/form/'.$project->project_cid)->with('success', $cid ? 'Project updated!' : 'Project saved!');
    }

    public function list(Request $request)
    {
        $list = Project::orderBy('sort')->get();
        return response()->json($list);
    }

    public function sort(Request $request)
    {
        $counter = 0;
        foreach ($request->input('sorting') as $value) {
            $project = Project::find($value['project_cid']);
            $project->sort = $value['sort'];
            $project->save();
            $counter++;
        }

        return response()->json([
            'counter' => $counter
        ]);
    }

    public function delete(Request $request, $cid='')
    {
        if (!$cid) return redirect('project');

        $project = Project::find($cid);
        if (count($project)) {
            $storage = Storage::disk('web');
            
            if ($project->img_portrait_url) {
                $storage->delete("project/{$project->project_cid}/".$project->img_portrait_url);
            }
            if ($project->img_landscape_url) {
                $storage->delete("project/{$project->project_cid}/".$project->img_landscape_url);
                $storage->delete("project/{$project->project_cid}/thumb_".$project->img_landscape_url);
            }

            $project->delete();
            return redirect('project')->with('success', 'Project deleted!');
        } else {
            return redirect('project')->with('fail', 'Project not found!');

        }
    }
}
