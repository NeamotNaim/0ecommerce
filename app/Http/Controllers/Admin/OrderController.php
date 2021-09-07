<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
class OrderController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
     

    public function newOrder(){

        $order=DB::table('orders')->where('status',0)->get();
        // dd($order);
        return view('admin.order.pending',compact('order'));
    }
    public function viewOrder($id){
        $order=DB::table('orders')
        ->join('users','orders.user_id','users.id',)
        ->where('orders.id',$id)
        ->select('orders.*','users.name','users.phone')
        ->first();
        // dd($order);
        $shipping=DB::table('shipping')->where('order_id',$id)->first();

        // dd($shipping);

        $detail=DB::table('orders_details')
        ->join('products','orders_details.product_id','products.id')
        ->where('orders_details.order_id',$id)
        ->select('orders_details.*','products.product_code','products.image_one')
        ->get();
        //  dd($details);
        return view('admin.order.order_view',compact('order','shipping','detail'));


    }
    public function acceptOrder($id){
        DB::table('orders')->where('orders.id',$id)->update(['status'=>1]);
         $notification=array(
                        'messege'=>'Order accept successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('admin.neworder')->with($notification);
    }
    public function cancelOrder($id){
        DB::table('orders')->where('orders.id',$id)->update(['status'=>4]);
        $notification=array(
                        'messege'=>'Order Cancel successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('admin.neworder')->with($notification);
    }
    public function pendingOrder(){
        $order=DB::table('orders')->where('status',1)->get();
        return view('admin.order.pending',compact('order'));
    }
    public function OrderCancelList(){
        $order=DB::table('orders')->where('status',4)->get();
        return view('admin.order.pending',compact('order'));
    }
    public function OrderProcessList(){
        $order=DB::table('orders')->where('status',2)->get();
        return view('admin.order.pending',compact('order'));
    }
    public function OrderDeliveryList(){
        $order=DB::table('orders')->where('status',3)->get();
        return view('admin.order.pending',compact('order'));
    }
    public function ProcessOrder($id){
        DB::table('orders')->where('orders.id',$id)->update(['status'=>2]);
        $notification=array(
                        'messege'=>'Order Shifted to Process',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('admin.accept.payment')->with($notification);
    }
     public function DeliveredOrder($id){
         $product=DB::table('orders_details')->where('order_id',$id)->get();
         foreach($product as $row){
             DB::table('products')->where('id',$row->product_id)
             ->update(['product_quantity'=>DB::raw('product_quantity-'.$row->quantity)]);
         }



        DB::table('orders')->where('orders.id',$id)->update(['status'=>3]);
        $notification=array(
                        'messege'=>'Order Shifted to Delivered',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('admin.process.delivery')->with($notification);
    }
    public function seoSec(){
        $seo=DB::table('seo')->first();
        return view('admin.blog.seo',compact('seo'));
    }
    public function seoUpdate(Request $request,$id){
        $data=array();
        $data['meta_title']=$request->meta_title;
        $data['meta_author']=$request->meta_author;
        $data['meta_tag']=$request->meta_tag;
        $data['meta_description']=$request->meta_description;
        $data['google_analytics']=$request->google_analytics;
        $data['bing_analytics']=$request->bing_analytics;
        DB::table('seo')->where('id',$id)->update($data);
        $notification=array(
                        'messege'=>'SEO update successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
            
    }
}
