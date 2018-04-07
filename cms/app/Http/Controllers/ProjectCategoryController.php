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
    public function index(Request $request)
    {
        return view('project-category', $this->data);
    }

    public function save(Request $request)
    {
        $category = new ProjectCategory;
        $category->project_category_cid = str_random(5);
        $category->name = $request->input('name');
        $category->slug = str_slug($request->input('name'));
        $category->save();

        return response()->json([
            'name' => $category->name,
            'project_category_cid' => $category->project_category_cid,
        ]);
    }

    public function list(Request $request)
    {
        $list = ProjectCategory::all();
        return response()->json($list);
    }

    public function sort(Request $request, $category='home')
    {
        // dd($request->all());
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

    public function delete(Request $request, $category='home')
    {
        $retval = ['status' => false];
        $id = (int)$request->input('id');

        if ($id) {
            $project_category = Project_category::find($id);
            if (count($project_category)) {

                Storage::disk('web')->delete("project_category/{$category}/".$project_category->img_url);
                $project_category->delete();

                $retval['id'] = $id;
                $retval['status'] = true;
                $retval['message'] = "Project_category id: {$id} has been deleted!";
            }
        }

        return response()->json($retval);
    }
}
