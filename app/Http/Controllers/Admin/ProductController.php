<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class ProductController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index(){
        $product=DB::table('products')
        ->join('categories','products.category_id','categories.id')
        ->join('brands','products.brand_id','brands.id')
        ->select('products.*','categories.category_name','brands.brand_name')
        ->get();
        // return response()->json($product);
        return view('admin.product.index',compact('product'));

    }
    
    public function create(){
        $category=DB::table('categories')->get();
        $brand=DB::table('brands')->get();
        return view('admin.product.create',compact('category','brand'));
    }
    public function GetSubcat($category_id){
        $cat=DB::table('subcategories')->where('category_id',$category_id)->get();
        return json_encode($cat);
    }

    public function store(Request $request){
        $data=array();
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['product_quantity']=$request->product_quantity;
        $data['category_id']=$request->category_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['brand_id']=$request->brand_id;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $data['selling_prize']=$request->selling_prize;
        $data['discount_prize']=$request->discount_prize;
        $data['product_details']=$request->product_details;
        $data['vedio_link']=$request->vedio_link;
        $data['main_slider']=$request->main_slider;
        $data['hot_deal']=$request->hot_deal;
        $data['mid_slider']=$request->mid_slider;
        $data['best_rated']=$request->best_rated;
        $data['trend']=$request->trend;
        $data['hot_new']=$request->hot_new;
        $data['status']=1;
        

        $image_one=$request->image_one;
        $image_two=$request->image_two;
        $image_three=$request->image_three;

        // return response()->json($data);
        if ($image_one && $image_two && $image_three ) {
           $image_one_name=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
           Image::make( $image_one)->resize(300,300)->save('media/product/'.$image_one_name);
           $data['image_one']='media/product/'.$image_one_name;

            $image_two_name=hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
           Image::make( $image_two)->resize(300,300)->save('media/product/'.$image_two_name);
           $data['image_two']='media/product/'.$image_two_name;

            $image_three_name=hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
           Image::make( $image_three)->resize(300,300)->save('media/product/'.$image_three_name);
           $data['image_three']='media/product/'.$image_three_name;


           $product=DB::table('products')->insert($data);
           $notification=array(
                        'messege'=>'Product Added Successfully ',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
        }


       

    } 
    
    public function inactive($id){
        DB::table('products')->where('id',$id)->update(['status'=>0]);
        $notification=array(
                        'messege'=>'Product Inactive Successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);

     }
     public function active($id){
        DB::table('products')->where('id',$id)->update(['status'=>1]);
        $notification=array(
                        'messege'=>'Product Active Successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);

     }

     public function delete($id){
         $product=DB::table('products')->where('id',$id)->first();
         $image_one=$product->image_one;
         $image_two=$product->image_two;
         $image_three=$product->image_three;
         unlink($image_one);
         unlink($image_two);
         unlink($image_three);
         DB::table('products')->where('id',$id)->delete();

         $notification=array(
                        'messege'=>'Product Deleted Successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
     }
     public function showProduct($id){
          $product=DB::table('products')
        ->join('categories','products.category_id','categories.id')
        ->join('subcategories','products.subcategory_id','subcategories.id')
        ->join('brands','products.brand_id','brands.id')
        ->select('products.*','categories.category_name','subcategories.subcategory_name'
        ,'brands.brand_name')
        ->where('products.id',$id)->first();
        // return response()->json($product);

        return view('admin.product.show',compact('product'));
        
     }
     public function editProduct($id){
       $product=DB::table('products')->where('id',$id)->first();
       return view('admin.product.edit',compact('product'));
     }
     public function updateProduct(Request $request,$id){
       $data=array();
        $data['product_name']=$request->product_name;
        $data['product_code']=$request->product_code;
        $data['product_quantity']=$request->product_quantity;
        $data['category_id']=$request->category_id;
        $data['subcategory_id']=$request->subcategory_id;
        $data['brand_id']=$request->brand_id;
        $data['product_size']=$request->product_size;
        $data['product_color']=$request->product_color;
        $data['selling_prize']=$request->selling_prize;
        $data['discount_prize']=$request->discount_prize;
        $data['product_details']=$request->product_details;
        $data['vedio_link']=$request->vedio_link;
        $data['main_slider']=$request->main_slider;
        $data['hot_deal']=$request->hot_deal;
        $data['mid_slider']=$request->mid_slider;
        $data['best_rated']=$request->best_rated;
        $data['trend']=$request->trend;
        $data['hot_new']=$request->hot_new;
        $data['status']=1;
        

        $image_one=$request->image_one;
        $image_two=$request->image_two;
        $image_three=$request->image_three;

        $image_one_old=$request->file('image_one_old');
        $image_two_old=$request->image_two_old;
        $image_three_old=$request->image_three_old;
        // return response()->json($image_one);

        if ($image_one) {
          if($image_one_old){
             unlink($image_one_old);
          }
         
           $image_one_name=hexdec(uniqid()).'.'.$image_one->getClientOriginalExtension();
           Image::make( $image_one)->resize(300,300)->save('media/product/'.$image_one_name);
           $data['image_one']='media/product/'.$image_one_name;
     }
     if ($image_two) {
       if($image_two_old){
            unlink($image_two_old);
          }
        
         $image_two_name=hexdec(uniqid()).'.'.$image_two->getClientOriginalExtension();
           Image::make( $image_two)->resize(300,300)->save('media/product/'.$image_two_name);
           $data['image_two']='media/product/'.$image_two_name;
     }
     if($image_three){
       if($image_three_old){
         unlink($image_three_old);
       }
             
            $image_three_name=hexdec(uniqid()).'.'.$image_three->getClientOriginalExtension();
           Image::make( $image_three)->resize(300,300)->save('media/product/'.$image_three_name);
           $data['image_three']='media/product/'.$image_three_name;
     }
     $udpate=DB::table('products')->where('id',$id)->update($data);
        if ($udpate) {
           $notification=array(
                        'messege'=>'Product Update Successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('product.all')->with($notification);
        }else{
          $notification=array(
                        'messege'=>'Product Not update',
                        'alert-type'=>'warning'
                         );
                       return Redirect()->route('product.all')->with($notification);
        }
    }
}
