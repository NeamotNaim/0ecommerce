<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Auth;

class ProductController extends Controller
{
    public function showProduct($id,$product_name){
        $product=DB::table('products')
        ->join('categories','products.category_id','categories.id')
        ->join('subcategories','products.subcategory_id','subcategories.id')
        ->join('brands','products.brand_id','brands.id')
        ->select('products.*','categories.category_name','subcategories.subcategory_name',
        'brands.brand_name')
        ->where('products.id',$id)
        ->first();
        $color=$product->product_color;
        $product_color=explode(',',$color);
        $size=$product->product_size;
        $product_size=explode(',',$size);
        return view('Pages.product_details',compact('product','product_color','product_size'));
    }
    public function searchProduct(Request $request){
      $item=$request->search;
      $product=DB::table('products')->where('product_name','LIKE',"%$item%")->paginate(20);
      return view('pages.search',compact('product'));

    }

    public function cartAdd($id, Request $request){
        $product=DB::table('products')->where('id',$id)->first();
        $data=array();
    
        if($product->discount_prize==NULL)
        {
            $data['id']=$product->id;
            $data['name']=$product->product_name;
            $data['qty']=$request->qty;
            $data['price']=$product->selling_prize;
            $data['weight']=1;
            $data['options']['image']=$product->image_one;
            $data['options']['color']=$request->color;
            $data['options']['size']=$request->size;
            Cart::add($data);
            $notification=array(
                        'messege'=>'Successfully Added to Cart',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification); 
        }else{
            
            $data['id']=$product->id;
            $data['name']=$product->product_name;
            $data['qty']=$request->qty;
            $data['price']=$product->discount_prize;
            $data['weight']=1;
            $data['options']['image']=$product->image_one;
            $data['options']['color']=$request->color;
            $data['options']['size']=$request->size;
             Cart::add($data);
            $notification=array(
                        'messege'=>'Successfully Added to Cart',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification); 
        }
    }
    public function productView($id){
        $product=DB::table('products')->where('subcategory_id',$id)->paginate(5);
        $category=DB::table('categories')->get();
        $subcategory=DB::table('subcategories')->where('id',$id)->first();
        $brand=DB::table('products')->where('subcategory_id',$id)->select('brand_id')->groupby('brand_id')->get();
        return view('pages.all_product',compact('product','category','brand','subcategory'));
    }
    public function productViewforCategory($id){
        $product=DB::table('products')->where('category_id',$id)->paginate(15);
        $category=DB::table('categories')->get();
        $categoryfix=DB::table('categories')->where('id',$id)->first();
        $brand=DB::table('products')->where('category_id',$id)->select('brand_id')->groupby('brand_id')->get();
        return view('pages.category_product',compact('product','category','brand','categoryfix'));
    }
    public function productViewforBrand($id){
         $product=DB::table('products')->where('brand_id',$id)->paginate(15);
        $category=DB::table('categories')->get();
        $categoryfix=DB::table('brands')->where('id',$id)->first();
        $brand=DB::table('brands')->get();
        return view('pages.brand_product',compact('product','category','brand','categoryfix'));
    }
    public function orderTracking(Request $request){
        $track=DB::table('orders')->where('status_code',$request->status_code)->first();
        if ($track) {
            return view('pages.tracking',compact('track'));
        } else {
            $notification=array(
                        'messege'=>'Invalid Status code',
                        'alert-type'=>'warning'
                         );
                       return Redirect()->back()->with($notification);
        }
        
    }
    public function successList(){
        $order=DB::table('orders')->where('user_id',Auth::id())->where('status',3)
        ->orderBy('id','DESC')->get();
        return view('pages.return_product',compact('order'));
    }
    public function returnRequest($id){
        DB::table('orders')->where('id',$id)->update(['return_order'=>1]);
        $notification=array(
                        'messege'=>'Return Requst under review',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
    }
}
