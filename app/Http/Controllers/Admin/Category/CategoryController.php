<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Admin\Category;
use DB;

class CategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function category(){
        $category=Category::all();
        return view('admin.category.category',compact('category'));
    }
    public function categoryStore(Request $request){
        $validatedata =$request->validate([
            'category_name'=>'required|unique:categories|max:50'
        ]);
        // Query builder data insert
        // $data=array();
        // $data['category_name']=$request->category_name;
        // DB::table('categories')->insert($data);

        // Eloquent ORM data insert
        $category=new Category();
        $category->category_name=$request->category_name;
        $category->save();



         $notification=array(
                        'messege'=>'Category Added Successfully ',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
                 

    }

    public function categoryDelete($id){
        DB::table('categories')->where('id',$id)->delete();
         $notification=array(
                        'messege'=>'Category Deleted Successfully ',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
                 
    }

    public function categoryEdit($id){
       $category= DB::table('categories')->where('id',$id)->first();
       return view('admin.category.edit_category',compact('category'));
    }
    

    public function categoryUpdate(Request $request,$id){
        $validatedata =$request->validate([
            'category_name'=>'required|max:50'
        ]);
        
        $data=array();
        $data['category_name']=$request->category_name;
        $update=DB::table('categories')->where('id',$id)->update($data);
        if($update){
             $notification=array(
                        'messege'=>'Category Updated Successfully ',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('categories')->with($notification);
        }
        else{
            $notification=array(
                        'messege'=>'Nothing to update ',
                        'alert-type'=>'error'
                         );
                       return Redirect()->route('categories')->with($notification);
        }
    }
}
