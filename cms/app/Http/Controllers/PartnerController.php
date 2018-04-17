<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Partner;

use Storage, Image;

class PartnerController extends Controller
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
        return view('partner', $this->data);
    }

    public function save(Request $request)
    {
        $storage = Storage::disk('web');

        if ($request->hasFile('file')) {

            $img_temp = $request->file('file');
            $file_type = $img_temp->getClientMimeType();
            $ext = $img_temp->extension();

            $partner = new Partner;
            $partner->img_url = str_replace('.', time().'.', $img_temp->getClientOriginalName());

            // uploading...
            if (str_contains($file_type, 'image')) {
                $image = Image::make(file_get_contents($img_temp));
                $image = $image->stream()->__toString();

                $storage->put("partner/".$partner->img_url, $image);
            }

            $partner->save();

            return response()->json([
                'partner_id' => $partner->partner_id,
                'image_url' => env('WEB_BASE_URL')."uploads/partner/".$partner->img_url,
            ]);
        }
    }

    public function list(Request $request)
    {
        $data = array();
        $list = Partner::orderBy('sort', 'asc')->get();
        foreach ($list as $partner) {
            $data[] = [
                'partner_id' => $partner->partner_id,
                'image_url' => env('WEB_BASE_URL')."uploads/partner/".$partner->img_url,
            ];
        }

        return response()->json($data);
    }

    public function sort(Request $request)
    {
        // dd($request->all());
        $counter = 0;
        foreach ($request->input('sorting') as $value) {
            $partner = Partner::find($value['partner_id']);
            $partner->sort = $value['sort'];
            $partner->save();
            $counter++;
        }

        return response()->json([
            'counter' => $counter
        ]);
    }

    public function delete(Request $request)
    {
        $retval = ['status' => false];
        $id = (int)$request->input('id');

        if ($id) {
            $partner = Partner::find($id);
            if (count($partner)) {

                $storage = Storage::disk('web');

                $storage->delete("partner/".$partner->img_url);
                $partner->delete();

                $retval['id'] = $id;
                $retval['status'] = true;
                $retval['message'] = "Partner id: {$id} has been deleted!";
            }
        }

        return response()->json($retval);
    }
}
