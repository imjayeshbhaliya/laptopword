<?php

namespace App\Http\Controllers;
use App\Modules\Product\Models\Product;
// use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\models\Cart;
use App\models\Billing_address;
use App\models\Shipping_address;
use Session;

use Auth;


use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart()
    {
        $cartitems = Cart::where('user_id',Auth::id())->get();
        $product=Product::where('is_deleted',0)
                         ->where('status',1)->get();
        return view('frontview.cart',compact('cartitems','product'));
    }

    

    public function removecart(Request $request){
        if (Auth::check()) {
            $prod_id = $request->input('prod_id');
            if (Cart::where('product_id',$prod_id)->where('user_id',Auth::id())->exists()) {
                // $cartitems = Cart::where('product_id',$prod_id)->where('user_id',Auth::id())->first()
                $cartitems = Cart::where('user_id',Auth::id())->where('product_id',$prod_id)->first();
                $cartitems-> delete();
                return response()->json(['status'=> "Deleted successfull"]);

            }
        }
         else
        {
            return response()->json(['status'=> "Login to continue "]);
            
        }
        
    }

    public function updatecart(Request $request)
    {
        $product_id= $request->input('prod_id');
        $product_qty= $request->input('prod_qty');

        if(Auth::check())
        {
            $qty2 = Product::where('id',$product_id)->first(['stock']);
           
            if($product_qty < 6 && $product_qty > 0 && $product_qty <= $qty2->stock  )
            {
                if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists())
                {
                    $cart= Cart::where('product_id',$product_id)->where('user_id',Auth::id())->first();
                    $cart->qty= $product_qty;
                    $cart->update();
                    return response()->json(['status'=>"Quantity updated!"]);
                }
            }
            else
            {
                return response()->json(['status'=>"Enter valid Quntity !!"]);
            }

        }
    }

    public function addtocart(Request $request)
    {
       $product_id=$request->input('product_id');
       $product_qty=$request->input('product_qty');
       
       $qty2 = Product::where('id',$product_id)->first(['stock']);
         

       if (Auth::check()) {
            if($product_qty < 6 && $product_qty <= $qty2->stock)
            {
                   $product= Product::where('id',$product_id)->first();
                   if ($product) {
                        if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
                             return response()->json(['status'=> "Already added to cart ! please check in cart"]);
                             // return response()->json(['status'=> "Already added to cart !"]);

                        }
                        else{
                            $cartitems = new Cart();
                            $cartitems->product_id = $product_id;
                            $cartitems->user_id = Auth::id();
                            $cartitems->qty = $product_qty;
                            $cartitems->save();

                            // return response()->json(['status'=> " added to cart "]);
                            return response()->json(['status'=> "Added to cart successfull !!"]);


                        }
                    }
            }
            else{
                return response()->json(['status'=> " Enter valid Quntity "]);
            }
       }
       else
       {    
            // print_r($request);
            // exit;
            $product_data = [
                'product_id'=>$product_id,
                'qty'=>$product_qty
            ];

            Session::put('cart',$product_data);
            // return $request;

            return response()->json(['status'=> "Login to continue "]);

       }
 
    }



    // public function store_billing_address(Request $request)
    // {
    //     $billing_id = $shipping_id = '';
    //     if ($request->addresses == 0) {
    //         $data = [
    //             'user_id' => Auth::id(),
    //             'first_name' => $request->first_name,
    //             'last_name' => $request->last_name,
    //             'status' => $request->shipping_method,
    //             'email' => $request->email,
    //             'phone_number' => $request->phone_number,
    //             'address' => $request->address,
    //             'pincode' => $request->pincode,
    //         ];
    //         $checkout = address::create($data);
    //         $billing_id = $checkout->id;
    //     }else{
    //         $billing_id = $request->addresses;
    //     }

    //     if(isset($request->shipping_method) && $request->shipping_method == 1){
    //         $shipping_id = $billing_id;
    //     }
    //     $checkout_arr= [
    //         'billing_id'=> $billing_id,
    //         'shipping_id'=> $shipping_id,
    //     ];
    //     session()->put('user_details', $data );
    //     session()->put('checkout', $checkout_arr);
    //     if ($request->shipping_method == '1') {
    //         return redirect('/payment')->with('status', 'data successfully added');
    //     } else {
    //         return redirect('/shiping_address')->with('status', 'data successfully added');
    //     }
    // }
    

    // public function addtocart(Request $request)
    // {
    //    $product_id=$request->input('product_id');
    //    $product_qty=$request->input('product_qty');
     // print_r($qty2->stock);
            // exit;
            // $qty2 = Product::where('id',$product_id)->value('stock');
            // $qty2=Product::where('is_deleted',0)->where('status',1)->where('id',$product_id)->get(['stock'])->first();
            // $qty2=3;
            // dd($qty2);


    //    if (Auth::check()) {
    //        $product= Product::where('id',$product_id)->first();
    //        if ($product) {
    //             if(Cart::where('product_id',$product_id)->where('user_id',Auth::id())->exists()){
    //                  return response()->json(['status'=> "Already added to cart "]);

    //             }
    //             else{
    //                 $cartitems = new Cart();
    //                 $cartitems->product_id = $product_id;
    //                 $cartitems->user_id = Auth::id();
    //                 $cartitems->qty = $product_qty;
    //                 $cartitems->save();

    //                 return response()->json(['status'=> " added to cart "]);

    //             }
    //         }
    //    }
    //    else
    //    {
    //         return response()->json(['status'=> "Login to continue "]);

    //    }
 
    // }
    // public function updatecart(Request $request){
    //     if (Auth::check()) {
    //         $prod_id = $request->input('prod_id');
    //         $prod_qty = $request->input('prod_qty');

    //         if (Cart::where('product_id',$prod_id)->where('user_id',Auth::id())->exists()) {
    //             // $cartitems = Cart::where('product_id',$prod_id)->where('user_id',Auth::id())->first()
    //             $cartitems = Cart::where('user_id',Auth::id())->where('product_id',$prod_id)->first();
    //             $cartitems->qty = $prod_qty;
    //             $cartitems-> update();
    //             return response()->json(['status'=> "Quntity updated successfull"]);

    //         }
    //     }
    //      else
    //     {
    //         return response()->json(['status'=> "Login to continue "]);
            
    //     }
        
    // }
}
