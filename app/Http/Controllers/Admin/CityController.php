<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\BusinessSetting;
use Illuminate\Support\Facades\Validator;
use App\CPU\CustomerManager;
use Brian2694\Toastr\Facades\Toastr;
use App\CPU\Helpers;
use App\Model\Translation;
use Illuminate\Support\Facades\Mail;
use App\Model\WalletTransaction;
use App\Model\City;
use App\Model\Pincode;
use App\Model\ShopPincode;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $query_param = [];
        $search = $request['search'];

        if ($request->has('search'))
        {
            $key = explode(' ', $request['search']);
            $citys = City::where(function ($q) use ($key) {
                foreach ($key as $value) {
                    $q->Where('name', 'like', "%{$value}%");
                }
            });
            
            $query_param = ['search' => $request['search']];
        }else{
            $citys = new City();
        }
        $citys = $citys->latest()->paginate(Helpers::pagination_limit())->appends($query_param);
        return view('admin-views.city.view',compact('citys','search'));
    }

  
    public function store(Request $request)
    {
        
       $citys = new City;
       $citys->name = $request->name[array_search('en', $request->lang)];
       $citys->save();
        foreach ($request->lang as $index => $key) {
            if ($request->name[$index] && $key != 'en') {
                Translation::updateOrInsert(
                    ['translationable_type' => 'App\Model\City',
                        'translationable_id' => $citys->id,
                        'locale' => $key,
                        'key' => 'name'],
                    ['value' => $request->name[$index]]
                );
            }
        }
        Toastr::success('City added successfully!');
        return back();
    }

    public function edit($id)
    {
        $citys = City::withoutGlobalScope('translate')->where('id', $id)->first();
        return view('admin-views.city.edit', compact('citys'));
    }

    public function update(Request $request)
    {
        $citys = city::find($request->id);
        $citys->name = $request->name[array_search('en', $request->lang)];
        $citys->save();

        foreach ($request->lang as $index => $key) {
            if ($request->name[$index] && $key != 'en') {
                Translation::updateOrInsert(
                    ['translationable_type' => 'App\Model\Attribute',
                        'translationable_id' => $citys->id,
                        'locale' => $key,
                        'key' => 'name'],
                    ['value' => $request->name[$index]]
                );
            }
        }
        Toastr::success('City updated successfully!');
        return redirect()->route('admin.city.view');
    }

    public function delete(Request $request)
    {
        $translation = Translation::where('translationable_type','App\Model\City')
                                    ->where('translationable_id',$request->id);
        $translation->delete();
        City::destroy($request->id);
        return response()->json();
    }

    public function fetch(Request $request)
    {
        if ($request->ajax()) {
            $data = Attribute::orderBy('id', 'desc')->get();
            return response()->json($data);
        }
    }

    public function get_pincode(Request $request)
    {
        // $request->session()->put('pincode', '416001');

        // return $request->session()->get('pincode');
        try {
            //code...
                $value = $request->term;
                $data = Pincode::where('pin_code', 'like', '%'.$value.'%')->pluck('pin_code');
                if (empty($data)) {
                    # code...
                    return response()->json($data = 'Pincode Not Avalable');
                    // Toastr::error('Pincode Not Avalable');

                }else {
                    return response()->json($data);
                    // Toastr::error('Pincode Not Avalable');
                }
        } catch (\Exception $th) {
            return ($th->getMessage("no data"));
        }
       
    }

    public function save_pincode(Request $request)
    {
        
        //  $shop_pincode = ShopPincode::all()->pluck('pincode');
        $pincode = ShopPincode::where('pincode', $request->pincode)->first();
        if(!empty($pincode)){
            // return "hiii";
            $request->session()->put('pincode', $request->pincode);
        }
        else{
            $request->session()->put('pincode','560001');
        }
            $request->session()->put('pincode_rebbin', 'submited');
                // return $request->session()->get('pincode');

            return redirect()->back();
       
       
    }
    
}
