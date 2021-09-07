<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
class WishlistController extends Controller
{
    public function wishlistAdd($id){
        $user_id=Auth::id();
        $data=array();
        $data['user_id']=$user_id;
        $data['product_id']=$id;
        $check=DB::table('wishlists')->where('user_id',$user_id)->where('product_id',$id)->first();

        if (Auth::Check()) {
           if ($check) {
             return \Response::json(['error'=>'Product Already Has on wishlist']);
           }else{
               DB::table('wishlists')->insert($data);
               return \Response::json(['success'=>'Product added on wishlist']);

           }
           
        }else{
            return \Response::json(['error'=>'Loging your account first']);
        }
        
        
    }
}
