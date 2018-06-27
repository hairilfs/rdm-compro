<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\{ About, Testimony, PartnerWho, Scope, People };
use View;

class AboutController extends Controller
{	
	public $data = array();

    public function index(Request $request, $section='who')
    {
    	if ($section=='who') 
        {
            $this->data['testimony'] = Testimony::publish()->get();
            $this->data['scope'] = Scope::publish()->orderBy('published_at')->get();
            $this->data['people'] = People::publish()->orderBy('sort')->get();          
            
            $allpartner = PartnerWho::orderBy('sort')->get();
            $this->data['partner_brand'] = $allpartner->where('category', 'brand')->take(4)->all();
            $this->data['partner_retail'] = $allpartner->where('category', 'retail')->take(4)->all();
            $this->data['partner_license'] = $allpartner->where('category', 'license')->take(5)->all();
        }

        return view('company-'.$section, $this->data);
    }

    public function partner(Request $request)
    {
        if($request->ajax()){
            $allpartner = PartnerWho::orderBy('sort')->get();
            $partner_brand = $allpartner->where('category', 'brand')->all();
            $partner_retail = $allpartner->where('category', 'retail')->all();
            $partner_license = $allpartner->where('category', 'license')->all();

            $data['partner_brand'] = View::make('partials.partner-list', ['partner' => $partner_brand])->render();
            $data['partner_retail'] = View::make('partials.partner-list', ['partner' => $partner_retail])->render();
            $data['partner_license'] = View::make('partials.partner-list', ['partner' => $partner_license])->render();

            return response()->json($data);
        }

        return response()->json([]);
    }

}
