<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class FrontendController extends Controller
{
    public function newsletterStore(Request $request){
        $valideData=$request->validate([
            'email'=>'required|unique:newsletters|max:55'
        ]);
        $data=array();
        $data['email']=$request->email;
       $newsletter= DB::table('newsletters')->insert($data);
       if($newsletter){
           $notification=array(
                        'messege'=>'Thanks for subscribing',
                        'alert-type'=>'success'
                         );
                          return redirect()->back()->with($notification);
       }else{
            $notification=array(
                        'messege'=>'Subscribe Not Successfully',
                        'alert-type'=>'warning'
                         );
                          return redirect()->back()->with($notification);
       }
    }

    public function newsletterDelete($id){
        DB::table('newsletters')->where('id',$id)->delete();
        $notification=array(
                        'messege'=>'Subscribe Deleted Successfully',
                        'alert-type'=>'success'
                         );
                          return redirect()->back()->with($notification);

    }
    public function registerIndex(){
        return view('auth.register');
    } 
    public function campaignsIndex(){
        return view('Pages.pagenotfound');
    }
        
    
}
