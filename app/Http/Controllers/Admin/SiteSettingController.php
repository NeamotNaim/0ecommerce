<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SiteSettingController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function siteSetting(){
        $setting=DB::table('sitesetting')->first();
        return view('admin.setting.site_setting',compact('setting'));
    }
    public function siteSettingUpdate(Request $request){
        $id=$request->id;

        $data=array();

        $data['phone_one']=$request->phone_one;
        $data['phone_two']=$request->phone_two;
        $data['email']=$request->email;
        $data['company_name']=$request->company_name;
        $data['company_address']=$request->company_address;
        $data['facebook']=$request->facebook;
        $data['youtube']=$request->youtube;
        $data['twitter']=$request->twitter;
        $data['instagram']=$request->instagram;
        $data['vimeo']=$request->vimeo;
        
        DB::table('sitesetting')->where('id',$id)->update($data);
        $notification=array(
                        'messege'=>'Site setting Update successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
    }
}
