<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Cart;
use Session;
class PaymentController extends Controller
{
    public function paymentProcess(Request $request){
       $data=array();
       $data['full_name']=$request->full_name;
       $data['phone']=$request->phone;
       $data['email']=$request->email;
       $data['address']=$request->address;
       $data['city']=$request->city;
       $data['payment']=$request->payment;
       //    dd($data);

       if ($request->payment=='stripe') {
            

		return view('pages.payment.stripe',compact('data'));
        //    return view('pages.payment.stripe',compact('data'));
       }elseif ($request->payment=='paypal') {
           # code...
       }elseif ($request->payment=='ideal') {
           # code...
       }else{
           echo"something wrong";
       }


    }
    public function paymentCharge(Request $request){

            $total=$request->total;
                    // Set your secret key. Remember to switch to your live secret key in production.
            // See your keys here: https://dashboard.stripe.com/apikeys
            \Stripe\Stripe::setApiKey('sk_test_51ImKNhDDUFgsaiyyQj0n2JWyt0UGJIM7O9lTp2dNMJf2cBY3l4g3wfWO2GLdooaUObVxsaVeHK1m6gUseP5FevF500pKnBzYn4');

            // Token is created using Checkout or Elements!
            // Get the payment token ID submitted by the form:
            $token = $_POST['stripeToken'];

            $charge = \Stripe\Charge::create([
            'amount' => $total*100,
            'currency' => 'usd',
            'description' => 'Product charge',
            'source' => $token,
            'metadata' => ['order_id' => uniqid()],
            ]);

            // dd($charge);
            $data=array();
            $data['user_id']=Auth::id();
            $data['payment_id']=$charge->payment_method;
            $data['payment_type']=$request->payment_type;
            $data['payment_amount']=$charge->amount;
            $data['blnc_transection']=$charge->balance_transaction;
            $data['stripe_order_id']=$charge->metadata->order_id;
            
            $data['vat']=$request->vat;
            $data['shipping_charge']=$request->shipping_charge;
            
            $data['total']=$request->total;
            
            if (Session::has('coupon')) {
                $data['subtotal']= Session::get('coupon')['balance'] ;
            }else{
                $data['subtotal']=Cart::subtotal() ;
            }
            $data['status']=0;
            $data['status_code']=mt_rand(100000,999999);
            $data['date']=date('d-m-y');
            $data['month']=date('F');
            $data['year']=date('Y');
            $order_id=DB::table('orders')->insertGetId($data);

            //Insert shipping
            $shipping=array();
            $shipping['order_id']=$order_id;
            $shipping['ship_name']=$request->ship_name;
            $shipping['ship_phone']=$request->ship_phone;
            $shipping['ship_email']=$request->ship_email;
            $shipping['ship_address']=$request->ship_address;
            $shipping['ship_city']=$request->ship_city;
            DB::table('shipping')->insert($shipping);

            //Order details
            $content=Cart::content();
            $details=array();
            foreach ($content as $item) {
                $details['order_id']=$order_id;
                $details['product_id']=$item->id;
                $details['product_name']=$item->name;
                $details['color']=$item->options->color;
                $details['size']=$item->options->size ;
                $details['quantity']=$item->qty;
                $details['singleprice']=$item->price;
                $details['totalprice']=$item->price * $item->qty;
                DB::table('orders_details')->insert($details);
               
            }
            Cart::destroy();
            if (Session::has('coupon')) {
                Session::forget('coupon');
            }
             $notification=array(
                        'messege'=>'Order Successfully done',
                        'alert-type'=>'success'
                         );
                       return Redirect()->to('/')->with($notification); 
    }
    
}
