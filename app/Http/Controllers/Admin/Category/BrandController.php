<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Brand;
use DB;
class BrandController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function brand(){
        $brand=Brand::all();
        return view('admin.category.brand',compact('brand'));
    }
    public function brandStore(Request $request){
        $validateData=$request->validate([
            'brand_name'=>'required|unique:brands|max:55'
        ]);
        $data=array();
         $data['brand_name']=$request->brand_name;
         $image=$request->file('brand_logo');
         if($image){
             $image_name=$image->getClientOriginalName().date('dmy_H_s_i');
             $ext=strtolower($image->getClientOriginalExtension ());
             $imgage_full_name=$image_name.'.'.$ext;
             $upload_path='media/brand/';
             $img_url=$upload_path.$imgage_full_name;
             $success=$image->move($upload_path,$imgage_full_name);

             $data['brand_logo']=$img_url;
             $brand=DB::table('brands')->insert($data);
              $notification=array(
                        'messege'=>'Brand Inserted Successfully ',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);

         }else{
             $brand=DB::table('brands')->insert($data);
             $notification=array(
                        'messege'=>'Brand Inserted without Logo ',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
         }

    }
    public function brandDelete($id){
       $data= DB::table('brands')->where('id',$id)->first();
        
       $image=$data->brand_logo;
       
        if (file_exists($image)) {

            unlink($image);
            // unlink($image);

        }
         
       
       
      $brand= DB::table('brands')->where('id',$id)->delete();
       $notification=array(
                        'messege'=>'Brand deleted successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);

        
    }
    public function brandEdit($id){
        $brand=DB::table('brands')->where('id',$id)->first();
        return view('admin.category.edit_brand',compact('brand'));

    }
    public function brandUpdate(Request $request,$id){
       $oldlogo=$request->old_logo;
        $validateData=$request->validate([
            'brand_name'=>'required|max:55'
        ]);
        $data=array();
         $data['brand_name']=$request->brand_name;
         $image=$request->file('brand_logo');
         if($image){
             unlink($oldlogo);
             $image_name=$image->getClientOriginalName().date('dmy_H_s_i');
             $ext=strtolower($image->getClientOriginalExtension ());
             $imgage_full_name=$image_name.'.'.$ext;
             $upload_path='media/brand/';
             $img_url=$upload_path.$imgage_full_name;
             $success=$image->move($upload_path,$imgage_full_name);

             $data['brand_logo']=$img_url;
              $brand=DB::table('brands')->where('id',$id)->update($data);
              $notification=array(
                        'messege'=>'Brand Update Successfully ',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('brands')->with($notification);

         }else{
              $brand=DB::table('brands')->where('id',$id)->update($data);
             $notification=array(
                        'messege'=>'Brand Updated without Logo ',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('brands')->with($notification);
         }

    }
}
