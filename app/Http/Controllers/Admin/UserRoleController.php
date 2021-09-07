<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class UserRoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function allUser(){
        $admin=DB::table('admins')->where('type',2)->get();
        return view('admin.role.all_role',compact('admin'));

    }
   public function createRole(){
        $admin=DB::table('admins')->where('type',2)->get();
        return view('admin.role.create_role',compact('admin'));

    } 

    public function storeAdmin(Request $request){
        $data=array();
        $data['name']=$request->name;
        $data['phone']=$request->phone;
        $data['email']=$request->email;
        $data['password']=Hash::make($request->password);
        $data['category']=$request->category;
        $data['orders']=$request->orders;
        $data['products']=$request->products;
        $data['other']=$request->other;
        $data['blogs']=$request->blogs;
        $data['coupon']=$request->coupon;
        $data['reports']=$request->reports;
        $data['return_order']=$request->return_order;
        $data['site_setting']=$request->site_setting;
        $data['product_comments']=$request->product_comments;
        $data['contact_message']=$request->contact_message;
        $data['user_role']=$request->user_role;
        $data['stock']=$request->stock;
        $data['type']=2;
        DB::table('admins')->insert($data);

        $notification=array(
                        'messege'=>'Child Admin created successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('admin.all.user')->with($notification);
    }

    public function deleteRoleAdmin($id){
        DB::table('admins')->where('id',$id)->delete();
        $notification=array(
                        'messege'=>'Child Admin Deleted successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);

    }
    public function editRoleAdmin($id){
       $user_role= DB::table('admins')->where('id',$id)->first();
        return view('admin.role.edit_role',compact('user_role'));

    }
    public function updateRoleAdmin(Request $request){
        $id=$request->id;

        $data=array();
        $data['name']=$request->name;
        $data['phone']=$request->phone;
        $data['email']=$request->email;
       
        $data['category']=$request->category;
        $data['orders']=$request->orders;
        $data['products']=$request->products;
        $data['other']=$request->other;
        $data['blogs']=$request->blogs;
        $data['coupon']=$request->coupon;
        $data['reports']=$request->reports;
        $data['return_order']=$request->return_order;
        $data['site_setting']=$request->site_setting;
        $data['product_comments']=$request->product_comments;
        $data['contact_message']=$request->contact_message;
        $data['user_role']=$request->user_role;
        $data['stock']=$request->stock;
        $data['type']=2;
        DB::table('admins')->where('id',$id)->update($data);
        $notification=array(
                        'messege'=>'Child Admin Updated successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('admin.all.user')->with($notification);
    }
    public function productStock(){
         $product=DB::table('products')
        ->join('categories','products.category_id','categories.id')
        ->join('brands','products.brand_id','brands.id')
        ->select('products.*','categories.category_name','brands.brand_name')
        ->get();
        // return response()->json($product);
        return view('admin.product.index',compact('product'));
    }
    
}
