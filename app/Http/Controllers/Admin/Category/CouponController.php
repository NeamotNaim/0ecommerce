<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CouponController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function coupon(){
        $coupon=DB::table('coupons')->get();
        return view('admin/category/coupon',compact('coupon'));
    }
    public function couponStore(Request $request){
        $data=array();
        $data['coupon']= $request->coupon;
        $data['discount']= $request->discount;
        DB::table('coupons')->insert($data);

        $notification=array(
                        'messege'=>'Coupon Created Successfully ',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
    }
    public function couponDelete($id){
       DB::table('coupons')->where('id',$id)->delete();
       $notification=array(
                        'messege'=>'Coupon Deleted Successfully ',
                        'alert-type'=>'success'
                         );
       return redirect()->back()->with($notification);
    }
    public function couponEdit($id){
        $coupon=DB::table('coupons')->where('id',$id)->first();
        return view('admin.category.edit_coupon',compact('coupon'));
    }
    public function couponUpdate(Request $request,$id){
        $data=array();
        $data['coupon']=$request->coupon;
        $data['discount']=$request->discount;
       $update= DB::table('coupons')->where('id',$id)->update($data);
       if($update){
           $notification=array(
                        'messege'=>'Coupon Update Successfully ',
                        'alert-type'=>'success'
                         );
       return redirect()->route('admin.coupon')->with($notification);
       }else{
           $notification=array(
                        'messege'=>'Coupon Not Updated ',
                        'alert-type'=>'warning'
                         );
                          return redirect()->route('admin.coupon')->with($notification);
       }

    }

    public function NewSletter(){
        $newsletter=DB::table('newsletters')->get();
        return view('admin.category.newsletter',compact('newsletter'));
    }
}
