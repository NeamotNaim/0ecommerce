<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Image;

class PostController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function blogcatList(){
        $blogcat=DB::table('post_category')->get();
        return view('admin.blog.category.index',compact('blogcat'));
    }
    public function blogcatStore(Request $request){
        $validateData=$request->validate([
            'category_name_en'=>'required|unique:post_category|max:55',
            
            'category_name_in'=>'required|unique:post_category|max:55'
        ]);
        $data=array();
        $data['category_name_en']=$request->category_name_en;
        $data['category_name_in']=$request->category_name_in;
        $blogcatstore=DB::table('post_category')->insert($data);

        $notification=array(
                        'messege'=>'Blog category Inserted successfully ',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
        

    }
    public function blogpostcatDelete($idd){

        DB::table('post_category')->where('id',$idd)->delete();
          $notification=array(
                        'messege'=>'Blog category Deleted successfully ',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
        

    }
    public function blogpostcatEdit($id){
        $blogcat=DB::table('post_category')->where('id',$id)->first();
        return view('admin.blog.category.edit',compact('blogcat'));
    }
    public function blogpostcatUpdate(Request $request, $id){
        $validateData=$request->validate([
            'category_name_en'=>'required|max:55',
            'category_name_in'=>'required|max:55'
        ]);
        $data=array();
        $data['category_name_en']=$request->category_name_en;
        $data['category_name_in']=$request->category_name_in;
        $blogcatstore=DB::table('post_category')->where('id',$id)->update($data);

          $notification=array(
                        'messege'=>'Blog category Update successfully ',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('add.blog.categorylist')->with($notification);
        
        
    }
    
    

    //Post 
    public function blogpostAdd(){
        $blogcat=DB::table('post_category')->get();
        return view('admin.blog.create',compact('blogcat'));
    }
    
    
    public function blogpostIndex(){
        $post=DB::table('posts')
        ->join('post_category','posts.post_category_id','post_category.id')
        ->select('posts.*','post_category.category_name_en')
        ->get();
        return view('admin.blog.index',compact('post'));
    }
    public function blogpostStore(Request $request){
        $data=array();
        $data['post_title_en']=$request->post_title_en;
        $data['post_title_in']=$request->post_title_in;
        $data['post_title_bn']=$request->post_title_bn;
        $data['post_category_id']=$request->post_category_id;
        $data['post_details_en']=$request->post_details_en;
        $data['post_details_in']=$request->post_details_in;
        $data['post_details_bn']=$request->post_details_bn;


         $post_image=$request->file('post_image');
         if ($post_image) {
           $post_image_name=hexdec(uniqid()).'.'.$post_image->getClientOriginalExtension();
           Image::make( $post_image)->resize(300,300)->save('media/post/'.$post_image_name);
           $data['post_image']='media/post/'.$post_image_name;
           $blogpost=DB::table('posts')->insert($data);
           $notification=array(
                        'messege'=>'Blog Post Created successfully ',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('blogpost.all')->with($notification);
         }else{
             $blogpost=DB::table('posts')->insert($data);
             $notification=array(
                        'messege'=>'Blog Post Created without Image successfully ',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('blogpost.all')->with($notification);
         }



        
       

        
    }
    public function blogpostDelete($id){
        $post=DB::table('posts')->where('id',$id)->first();
        $image=$post->post_image;
        unlink($image);
         DB::table('posts')->where('id',$id)->delete();

        $notification=array(
                        'messege'=>'Blog Post Deleted successfully ',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('blogpost.all')->with($notification);
    }
    public function blogpostEdit($id){
        $post=DB::table('posts')->where('id',$id)->first();
        return view('admin.blog.edit',compact('post'));
    }
    public function blogpostUpdate(Request $request, $id){
        $data=array();
        $data['post_title_en']=$request->post_title_en;
        $data['post_title_in']=$request->post_title_in;
        $data['post_title_bn']=$request->post_title_bn;
        $data['post_category_id']=$request->post_category_id;
        $data['post_details_en']=$request->post_details_en;
        $data['post_details_in']=$request->post_details_in;
        $data['post_details_bn']=$request->post_details_bn;

        $new_post_image=$request->file('new_post_image');
        $old_post_image=$request->old_post_image;
         if ($new_post_image) {
             if($old_post_image){
                 unlink($old_post_image);
             }
             
           $post_image_name=hexdec(uniqid()).'.'.$new_post_image->getClientOriginalExtension();
           Image::make( $new_post_image)->resize(300,300)->save('media/post/'.$post_image_name);
           $data['post_image']='media/post/'.$post_image_name;
           $blogpost=DB::table('posts')->where('id',$id)->update($data);
           $notification=array(
                        'messege'=>'Blog Post Updated successfully ',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('blogpost.all')->with($notification);
         }else{
             $blogpost=DB::table('posts')->where('id',$id)->update($data);
             $notification=array(
                        'messege'=>'Blog Post Update without Image successfully ',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('blogpost.all')->with($notification);
         }

        
       
    }

}
