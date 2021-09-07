<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ReturnController extends Controller
{
       public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function returRequest(){
        $order=DB::table('orders')->where('return_order',1)->get();
        return view('admin.return.request',compact('order'));
    }
    public function approveRequest($id){
        DB::table('orders')->where('id',$id)->update(['return_order'=>2]);
        $notification=array(
                        'messege'=>'Return Request Approved',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);

    }
    public function returRequestall(){
        $order=DB::table('orders')->where('return_order',2)->get();
        return view('admin.return.request',compact('order'));
    }
}
