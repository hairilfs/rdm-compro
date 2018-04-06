<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slider;

use Storage, Image;

class SliderController extends Controller
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
    public function index(Request $request, $category='home')
    {
        $this->data['category'] = title_case($category);
        return view('slider', $this->data);
    }

    public function save(Request $request, $category='home')
    {
        $storage = Storage::disk('web');

        if ($request->hasFile('file')) {

            $img_temp = $request->file('file');
            $file_type = $img_temp->getClientMimeType();

            $slider = new Slider;
            $slider->img_url = $img_temp->getClientOriginalName();
            $slider->category = $category;
            $slider->is_publish = 1;
            $slider->published_at = date('Y-m-d H:i:s');

            // uploading...
            if (str_contains($file_type, 'image')) {
                $image = Image::make(file_get_contents($img_temp));
                $image = $image->stream()->__toString();

                $storage->put("slider/{$category}/".$slider->img_url, $image);
            }

            $slider->save();

            return response()->json([
                'slider_id' => $slider->slider_id,
                'image_url' => env('WEB_BASE_URL')."uploads/slider/{$category}/".$slider->img_url,
            ]);
        }
    }

    public function list(Request $request, $category='home')
    {
        $data = array();
        $list = Slider::where('category', $category)->orderBy('sort', 'asc')->get();
        foreach ($list as $slider) {
            $data[] = [
                'slider_id' => $slider->slider_id,
                'image_url' => env('WEB_BASE_URL')."uploads/slider/{$category}/".$slider->img_url,
            ];
        }

        return response()->json($data);
    }

    public function sort(Request $request, $category='home')
    {
        // dd($request->all());
        $counter = 0;
        foreach ($request->input('sorting') as $value) {
            $slider = Slider::find($value['slider_id']);
            $slider->sort = $value['sort'];
            $slider->save();
            $counter++;
        }

        return response()->json([
            'counter' => $counter
        ]);
    }
}
