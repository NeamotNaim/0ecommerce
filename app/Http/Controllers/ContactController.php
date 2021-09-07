<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class ContactController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function contactIndex(){
        return view('pages.contact');
    }
    public function contactForm(Request $request){
        $data=array();
        $data['name']=$request->name;
        $data['phone']=$request->phone;
        $data['email']=$request->email;
        $data['message']=$request->message;
        DB::table('contact')->insert($data);

        $notification=array(
                        'messege'=>'Message sent successfully',
                        'alert-type'=>'success'
                         );
                       return Redirect()->back()->with($notification); 
    }
    public function contactallMessage(){
        $contact=DB::table('contact')->get();
        return view('admin.contact.all_message',compact('contact'));
    }
    public function contactMessageView($id){
        $contact=DB::table('contact')->where('id',$id)->first();
        return view('admin.contact.show_message',compact('contact'));
    }
}
