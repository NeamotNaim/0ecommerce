<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class SubcategoryController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function subcategory(){
        $category=DB::table('categories')->get();
        $subcat=DB::table('subcategories')
        ->join('categories','subcategories.category_id','categories.id')
        ->select('subcategories.*','categories.category_name')
        ->get();
        return view('admin.category.subcategory',compact('subcat','category'));
    }
    public function subcategoryStore(Request $request){
        $validate=$request->validate([
           'subcategory_name'=>'required|max:55',
           'category_id'=>'required'
        ]);
        $data=array();
        $data['subcategory_name']=$request->subcategory_name;
        $data['category_id']=$request->category_id;
        DB::table('subcategories')->insert($data);

        $notification=array(
                        'messege'=>'Sub Category Added Successfully ',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
    }
    public function subcategoryDelete($id){
        DB::table('subcategories')->where('id',$id)->delete();
          $notification=array(
                        'messege'=>'Sub Category Deleted Successfully ',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification);
    }
    public function subcategoryEdit($id){
      $subcategory=  DB::table('subcategories')->where('id',$id)->first();
      $category=DB::table('categories')->get();
      return view('admin.category.edit_subcategory',compact('subcategory','category'));

    }
    public function subcategoryUpdate(Request $request,$id){
      $validate=$request->validate([
           'subcategory_name'=>'required|max:55',
           'category_id'=>'required'
        ]);
        $data=array();
        $data['subcategory_name']=$request->subcategory_name;
        $data['category_id']=$request->category_id;
        DB::table('subcategories')->where('id',$id)->update($data);

        $notification=array(
                        'messege'=>'Sub Category Updated Successfully ',
                        'alert-type'=>'success'
                         );
                       return Redirect()->route('sub.categories')->with($notification);
    }
}
