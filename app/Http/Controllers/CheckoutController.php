<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Modules\Product\Models\Product;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\models\Cart;
use App\models\Billing_address;
use App\models\Shipping_address;
use App\models\Payment;
use App\models\Orders;
use App\models\Order_details;
use Session;

use Auth;

class CheckoutController extends Controller
{
    

        
    
    public function billing()
    {
        if (Auth::check()) {
            $billing_address = Billing_address::where('user_id',Auth::id())->get();
        
            
            return view('frontview.checkout1',compact('billing_address'));
        }
         else
        {
            return response()->json(['status'=> "Login to continue "]);
            
        }
        
        // return view('frontview.checkout1');
    }

    public function addbilling(Request $request)
    {

        $billing_id = $shipping_id = '';



        if ($request->addresses == 0) {

            $data = [
                'user_id' => Auth::user()->id,
                'name'=>$request->name,
                'email'=>$request->email,
                'mobile_number' =>$request->mobile_number,
                'state' =>$request->state,
                'city' =>$request->city,
                'pincode' => $request->pincode,
                'address' => $request->address
            ];

            $id = Billing_address::create($data);


            $billing_id = $id->id;

        }
        else
        {
            $billing_id = $request->addresses;
        }

        if(isset($request->shipping) && $request->shipping == 1){
            $shipping_id = $billing_id;
        }
        $checkout_arr= [
            'billing_id'=> $billing_id,
            'shipping_id'=> $shipping_id,
        ];

        session()->put('id', $checkout_arr);

        


        if($request->shipping == 1){
            return redirect('/payment');
        }
        else{
            return redirect('/shipping');
        }
    }

    

    public function shipping()
    {
        if (Auth::check()) {
            $billing_address = Billing_address::where('user_id',Auth::id())->get();
            return view('frontview.checkout2',compact('billing_address'));
        }
         else
        {
            return response()->json(['status'=> "Login to continue "]);
        }   
    }

    public function addshipping(Request $request)
    {
        $session_store = session('id');
        $billing_id = (int)$session_store['billing_id'];
       

        if ($request->addresses == 0) {

            $data = [
                'user_id' => Auth::user()->id,
                'name'=>$request->name,
                'email'=>$request->email,
                'mobile_number' =>$request->mobile_number,
                'state' =>$request->state,
                'city' =>$request->city,
                'pincode' => $request->pincode,
                'address' => $request->address
            ];

            $id = Billing_address::create($data);


            $shipping_id = $id->id;

        }
        else
        {
            $shipping_id = $request->addresses;
        }

        
        $checkout_arr= [
            'billing_id'=> $billing_id,
            'shipping_id'=> $shipping_id,
        ];
        session()->put('id', $checkout_arr);



       

        
        return redirect('/payment');
        
    }
    
    public function orderreview()
    {
        $data = [
            'user_id' => Auth::user()->id,
            'name'=>Auth::user()->name,
            'status'=>"1",
            
        ];

        $payment_id = Payment::create($data);


        // $payment_id = $id->id;
        $session_store = session ('id');
        $billing_id = (int)$session_store['billing_id'];
        $shipping_id = (int)$session_store['shipping_id'];

        // dd($shipping_id, $billing_id);
        $billing_address = Billing_address::where('user_id',Auth::id())->where('id',$billing_id)->get();
        $shipping_address = Billing_address::where('user_id',Auth::id())->where('id',$shipping_id)->get();


        $cartitems = Cart::where('user_id',Auth::id())->get();
        return view('frontview.checkout4',compact('cartitems','billing_address','shipping_address','payment_id'));
        
    }
    public function payment()
    {
        if (Auth::check()) {
            
            return view('frontview.checkout3');
        }
         else
        {
            return response()->json(['status'=> "Login to continue "]);
            
        }
        
        
    }
    public function placeorder(Request $request){
        $pay_id = $request->payment_id;
        $session_store = session('id');

        $billing_id = (int)$session_store['billing_id'];
        $shipping_id = (int)$session_store['shipping_id'];


        $order_data = Orders::create([
            'user_id' => Auth::user()->id,
            'shipping_id' => $shipping_id,
            'billing_id' => $billing_id,
            'payment_id' => $pay_id,
            'total_price' => $request->total_price,
            

        ]);

        foreach ($request->product_id as $key => $value) {

            Order_details::insert([
                'user_id' => Auth::user()->id,
                'order_id' => $order_data->id,
                'product_id' => $value,
                'quantity' => $request->qty[$key],
                'total_price' => $request->sub_total[$key],
            ]);
        }
        $Product_id = Product::where('id', $value)->decrement('stock', $request->qty[$key]);

        Cart::where('User_id', Auth::user()->id)->delete();

        return redirect('/thankyou');
    }
    public function thankyou(){
        return view('frontview.thankyou');
    }



    public function myorders()
    {
        if (Auth::check()) {
            $Orders = Orders::where('user_id',Auth::id())->get();
        
            
            return view('frontview.myorders',compact('Orders'));
        }
         else
        {
            return response()->json(['status'=> "Login to continue "]);
        }
    }
    public function myorder_details($id)
    {
        $order = Orders::where('id',$id)->get();
        $Order_details = Order_details::where('order_id',$id)->get();
        return view("frontview.myorderdetail",compact('order','Order_details'));
    }



    public function address()
    {
       
        if (Auth::check()) {
            $address = Billing_address::where('user_id',Auth::id())->get();
            $shippingaddress = Shipping_address::where('user_id',Auth::id())->get();


            return view('frontview.address',compact('address','shippingaddress'));
            
        }
         else
        {
            return response()->json(['status'=> "Login to continue "]);
            
        }
        
        
    }
    public function save_address(Request $request)
    {
       
        $method = $request -> addressmethod;

        if($method=="rs1"){
            $billing_address = new Billing_address();
                        
                        $billing_address->user_id = Auth::id();
                        $billing_address->name = $request->name;
                        $billing_address->email = $request->email;
                        $billing_address->mobile_number = $request->mobile_number;
                        $billing_address->state = $request->state;
                        $billing_address->city = $request->city;
                        $billing_address->pincode = $request->pincode;
                        $billing_address->address = $request->area_address;
                        $billing_address->save();
                        return redirect('/address');

        }
        else
        {
                        $billing_address = new Shipping_address();
                        
                        $billing_address->user_id = Auth::id();
                        $billing_address->name = $request->name;
                        $billing_address->email = $request->email;
                        $billing_address->mobile_number = $request->mobile_number;
                        $billing_address->state = $request->state;
                        $billing_address->city = $request->city;
                        $billing_address->pincode = $request->pincode;
                        $billing_address->address = $request->area_address;
                        $billing_address->save();

                         return redirect('/address');

        }
    }
    
    
}

