<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Cart;
use Response;
use Auth;
use Session;

class CartController extends Controller
{
    public function cartAdd($id){
        $product=DB::table('products')->where('id',$id)->first();
        $data=array();
    
        if($product->discount_prize==NULL)
        {
            $data['id']=$product->id;
            $data['name']=$product->product_name;
            $data['qty']=1;
            $data['price']=$product->selling_prize;
            $data['weight']=1;
            $data['options']['image']=$product->image_one;
            $data['options']['color']='';
            $data['options']['size']='';
            Cart::add($data);
             return \Response::json(['success'=>'Product Successfully added to Cart']);
            // return response()->json($data);
        }else{
            
            $data['id']=$product->id;
            $data['name']=$product->product_name;
            $data['qty']=1;
            $data['price']=$product->discount_prize;
            $data['weight']=1;
            $data['options']['image']=$product->image_one;
            $data['options']['color']='';
            $data['options']['size']='';
             Cart::add($data);
            // echo "Hello world!<br>";
            // return response()->json($data);
            return \Response::json(['success'=>'Product Successfully added to Cart']);
        }
    }
    public function CartShow(){
        $cart=Cart::content();
        return view('pages.cart',compact('cart'));
    }
    public function CartRemove($rowId){
        Cart::remove($rowId);
        $notification=array(
                        'messege'=>'Successfully Remove from Cart',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification); 
    }
    public function CartUpdate(Request $request){
        $rowId=$request->productid;
        $qty=$request->qty;
        Cart::update($rowId,$qty);
         $notification=array(
                        'messege'=>'Successfully Update Item of Cart',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification); 
    }
    public function Cartquickview($id){
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


        return response::json(array( 
            'product'=>$product,
            'color'=>$product_color,
            'size'=>$product_size,
        
        ));
    }
    public function CartInsert(Request $request){
        $id=$request->product_id;
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
    public function CartCheckout(){
        if(Auth::check()){
             $cart=Cart::content();
            return view('pages.checkout',compact('cart'));

        }else{
            $notification=array(
                        'messege'=>'First Login to checkout',
                        'alert-type'=>'warning'
                         );
                       return Redirect()->route('login')->with($notification); 
            
        }
    }
    public function UserWishlist(){
        $userid=Auth::id();
        $product=DB::table('wishlists')
        ->join('products','wishlists.product_id','products.id')
        ->select('products.*','wishlists.user_id')
        ->where('wishlists.user_id',$userid)
        ->get();
        // return response()->json($product);
        return view('pages.wishlist',compact('product'));
    }
    public function CouponApply(Request $request){
        $coupon=$request->coupon;
        $check=DB::table('coupons')->where('coupon',$coupon)->first();
        if ($check) {
            Session::put('coupon',[
                'name'=>$check->coupon,
                'discount'=>$check->discount,
                'balance'=>Cart::Subtotal()-$check->discount
            ]);
             $notification=array(
                        'messege'=>'Coupon Applied',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification); 

           
        }else{
            $notification=array(
                        'messege'=>'Coupon Invalid',
                        'alert-type'=>'warning'
                         );
                       return Redirect()->back()->with($notification); 
        }

    }
    public function CouponRemove(){
        Session::forget('coupon');
         $notification=array(
                        'messege'=>'Coupon Remove successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification); 
    }

    public function paymentPage(){
        $cart=Cart::content();
        return view('pages.payment',compact('cart'));
    }
    public function check(){
        $content=Cart::content();
        return response()->json($content);
    }
}
