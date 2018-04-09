<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ProjectCategory;

class ProjectCategoryController extends Controller
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
    public function index(Request $request, $cid="", $edit="")
    {
        $this->data['category'] = $cid && $edit ? ProjectCategory::find($cid) : array();
        return view('project-category', $this->data);
    }

    public function save(Request $request, $cid="", $edit="")
    {
        $category = $cid && $edit ? ProjectCategory::find($cid) : new ProjectCategory;
        if(!$cid && $edit) $category->project_category_cid = str_random(5);
        $category->name = $request->input('name');
        $category->slug = str_slug($request->input('name'));
        $category->save();

        return redirect('/project-category')->with('success', 'Category saved!');
    }

    public function list(Request $request)
    {
        $list = ProjectCategory::orderBy('sort')->get();
        return response()->json($list);
    }

    public function sort(Request $request)
    {
        $counter = 0;
        foreach ($request->input('sorting') as $value) {
            $project_category = ProjectCategory::find($value['project_category_cid']);
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

        $project_category = ProjectCategory::find($cid);
        if (count($project_category)) {
            $project_category->delete();
            return redirect('project-category')->with('success', 'Category deleted!');
        } else {
            return redirect('project-category')->with('fail', 'Category not found!');

        }
    }
}
