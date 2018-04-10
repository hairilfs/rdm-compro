<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use DataTables;

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
        $project->project_category = $request->input('project_category');
        $project->published_at = date('Y-m-d H:i:s', strtotime($request->input('published_at')));
        $project->is_publish = $request->input('is_publish') ? 1 : 0;

        $project->save();

        return redirect('/project')->with('success', 'Project saved!');
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
            $project_category = Project::find($value['project_category_cid']);
            $project_category->sort = $value['sort'];
            $project_category->save();
            $counter++;
        }

        return response()->json([
            'counter' => $counter
        ]);
    }

    public function delete(Request $request, $cid='')
    {
        if (!$cid) return redirect('project-category');

        $project_category = Project::find($cid);
        if (count($project_category)) {
            $project_category->delete();
            return redirect('project-category')->with('success', 'Category deleted!');
        } else {
            return redirect('project-category')->with('fail', 'Category not found!');

        }
    }
}
