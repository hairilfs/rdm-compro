<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{ Module, ModuleImage, Project };
use Storage, Image;

class ModuleController extends Controller
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
    public function index(Request $request, $category=null, $id=null)
    {
        $this->data['module'] = $id ? Module::find($id) : new Module;
        $this->data['category'] = $category;
        $this->data['project'] = Project::find($request->input('project'));
        return view('module-form', $this->data);
    }

    public function save(Request $request, $category=null, $id=null)
    {
        // dd($request->all());
        $module = $id ? Module::find($id) : new Module;
        switch ($category) {
            case 'text':
                $module->content = $request->input('text');
                break;
            
            default:
                // code...
                break;
        }

        $module->project_cid = $request->input('project');
        $module->module_type = config('extra.module_type.'.$category);
        $module->published_at = date('Y-m-d H:i:s', strtotime($request->input('published_at')));
        $module->is_publish = $request->input('is_publish') ? 1 : 0;
        $module->save();      

        $storage = Storage::disk('web');

        if ($request->hasFile('img1')) 
        {
            $img1_temp = $request->file('img1');
            $file_type = $img1_temp->getClientMimeType();

            $filename = str_replace('.', time().'.', $img1_temp->getClientOriginalName());
            if (str_contains($file_type, 'image')) {
                $image = Image::make(file_get_contents($img1_temp));
                $image = $image->stream()->__toString();

                $storage->put("module_image/{$module->project_cid}/".$filename, $image);

                $mi = new ModuleImage;
                $mi->module_id = $module->module_id;
                $mi->img_url = $filename;
                $mi->save();
            }
        }

        return redirect("/module/{$category}/{$module->module_id}?project=".$module->project_cid)->with('success', $id ? 'Module updated!' : 'Module saved!');
    }

    public function list(Request $request, $cid=null)
    {
        if(!$cid) return response()->json([]);

        $list = [];
        $modules = Module::where('project_cid', $cid)->orderBy('sort')->with('images')->get();
        foreach ($modules as $key => $value) {
            $list[$key] = [
                'project_cid' => $value->project_cid,
                'module_type' => $value->module_type,
                'content' => $value->content,
                'sort' => $value->sort,
            ];

            foreach ($value->images as $index => $image) {
                $list[$key]['image'][$index] = $image->getImgUrl($cid);
            }
        }

        return response()->json($list);
    }

    public function sort(Request $request)
    {
        $counter = 0;
        foreach ($request->input('sorting') as $value) {
            $module_category = Module::find($value['module_category_id']);
            $module_category->sort = $value['sort'];
            $module_category->save();
            $counter++;
        }

        return response()->json([
            'counter' => $counter
        ]);
    }

    public function delete(Request $request, $id='')
    {
        if (!$id) return redirect('module-category');

        $module_category = Module::find($id);
        if (count($module_category)) {
            $module_category->delete();
            return redirect('module-category')->with('success', 'Category deleted!');
        } else {
            return redirect('module-category')->with('fail', 'Category not found!');

        }
    }
}
