<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{


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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $settings=Setting::all();
        // return $settings;
        if(count($settings)>0){
            return view('bill.setting-update', ['settings'=>$settings]);
        }else{
            return view('bill.setting');
        }
    }
    public function store(Request $request)
    {
      
      // return $request;
         if($request->pan_no == null)
        {
                $this->validate($request, [
                     'shop_name'=>'string',
                     'contact_no'=>' max:14 | min:10'
               ]);
        }
        else
        {
               $this->validate($request, [
                     'shop_name'=>'string|unique:settings',
                     'pan_no'=>'unique:settings| max:9 | min:9',
                     'contact_no'=>'unique:settings| max:14| min:10'
                ]);
        }
        $setting= new Setting;
        $setting->shop_name=$request->shop_name;
        $setting->address=$request->address;
        $setting->pan_no=$request->pan_no;
        $setting->contact_no=$request->contact_no;
        $setting->date_type=$request->date_type;
        if($setting->save()){
            return redirect()->route('setting')->with('sucess', 'Sucessfully Saved');
        }else{
            return back()->withInput()->with('error', 'could not save now please try again');
        }
    }  
    public function update(Request $request)
    {
        //
        if($request->pan_no == null)
        {
                $this->validate($request, [
                     'shop_name'=>'string',
                     'contact_no'=>' max:14 | min:10'
               ]);
        }
        else
        {
              $this->validate($request, [
                     'shop_name'=>'string',
                     'pan_no'=>' max:9 | min:9',
                     'contact_no'=>' max:14 | min:10'
                ]);
        }
        $setting=Setting::find($request->id);
        $setting->shop_name=$request->shop_name;
        $setting->address=$request->address;
        $setting->pan_no=$request->pan_no;
        $setting->contact_no=$request->contact_no;
        $setting->date_type=$request->date_type;
        if($setting->save()){
            return redirect()->route('setting')->with('sucess', 'Sucessfully Saved');
        }else{
            return back()->withInput()->with('error', 'could not save now please try again');
        }
        
    }
}
