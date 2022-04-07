<?php

namespace App\Http\Controllers;

use App\Modules\Category\Models\Category;
use App\Modules\Colour\Models\Colour;
use App\Modules\Product\Models\Product;
use App\models\Multipleimage;
use App\models\Cart;


use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        return view('frontview.home');
    }
    public function grid()
    {
        $category = Category::where('is_deleted',0)
                         ->where('status',1)->get();
        $colour=Colour::where('is_deleted',0)
                        ->where('status',1)->get();
        $products=Product::where('is_deleted',0)
                         ->where('status',1)->get();
        return view('frontview.grid', compact('products','category','colour'));
    }
    
    public function list()
    {
        $category = Category::where('is_deleted',0)
                         ->where('status',1)->get();
        $colour=Colour::where('is_deleted',0)
                        ->where('status',1)->get();
        $products=Product::where('is_deleted',0)
                         ->where('status',1)->get();
        return view('frontview.list', compact('products','category','colour'));
    }
    public function products()
    {
        $category = Category::where('is_deleted',0)
                         ->where('status',1)->get();
        $colour=Colour::where('is_deleted',0)
                        ->where('status',1)->get();
        $products=Product::where('is_deleted',0)
                         ->where('status',1)->get();

       
        return view('frontview.slider', compact('products','category','colour'));
    }
    public function getrangeajax(Request $request)
    {   
        $tmp_category = $request->tmp_category;
        $tmp_category = str_replace("|",",",$tmp_category);
        $cat_arr = explode(',',$tmp_category);
        $remove = array_pop($cat_arr); 


        $tmp_colour = $request->tmp_colour;
        $tmp_colour = str_replace("|",",",$tmp_colour);
        $clr_arr = explode(',',$tmp_colour);
        $remove = array_pop($clr_arr);

        $minimum_price = $request->min_price;
        $maximum_price = $request->max_price;

         // $products=Product::where('is_deleted',0)
                         // ->where('status',1)->whereBetween('price', [(int)$minimum_price, (int)$maximum_price])->get();

        // dd($products);


        // print_r($cat_arr);
        // print_r($clr_arr);
        // print_r($minimum_price);
        // print_r($maximum_price);
        // print_r($products);
        // exit;



       if(!empty($cat_arr))
       {
            if(!empty($clr_arr))
            {
                // $products=Product::where('is_deleted',0)->where('status','1')->wherein('category_id',$cat_arr)->wherein('colour_id',$clr_arr)->whereBetween('price', [$minimum_price, $maximum_price])->get();
                $products=Product::whereIn('category_id',$cat_arr)->whereIn('colour_id',$clr_arr)->where('is_deleted',0)->where('status',1)->whereBetween('price', [(int)$minimum_price, (int)$maximum_price])->get();
                       // dd($product);


            }else{
                $products=Product::where('is_deleted',0)->where('status','1')->wherein('category_id',$cat_arr)->whereBetween('price', [(int)$minimum_price, (int)$maximum_price])->get();
            }
       }
       else
       {
            if(!empty($request->tmp_colour))
                {
                    $products=Product::where('is_deleted',0)->where('status','1')->wherein('colour_id',$clr_arr)->whereBetween('price', [(int)$minimum_price, (int)$maximum_price])->get();
            }
            else
            {
                $products=Product::where('is_deleted',0)->where('status','1')->whereBetween('price', [(int)$minimum_price, (int)$maximum_price])->get();
            }
        }
        
       // dd($products);
       $category = Category::where('is_deleted',0)
                         ->where('status',1)->get();
        $colour=Colour::where('is_deleted',0)
                        ->where('status',1)->get();
       
        
        return view('frontview.grid',compact('products','category','colour'));
    }
    
    

    public function detail($url)
    {
        $products=Product::where('is_deleted',0)->where('status',1)->get();
        $colour=Colour::where('is_deleted',0)->where('status',1)->get();

        $products = Product::where('url', $url)->where('is_deleted',0)->where('status',1)->get();
        $id = Product::where('url', $url)->get(['id'])->first();
        $filter_id = json_decode($id, true);
        $subimages = multipleimage::where('product_id', $filter_id)->orderBy('sort', 'asc')->get();
        $products = Product::where('url', $url)->get();
        return view('frontview.detail', compact('products', 'subimages'));
    }
   
   

}






















































// public function sortproduct(Request $request)
    //     {

    //     if (isset($request->category)&&isset($request->colour))
    //     {
    //         $product=Product::whereIn('category_id',$request->category)->whereIn('color_id',$request->colour)->where('is_deleted',0)->where('status',1)->whereBetween('price', [$request->min_price, $request->max_price])->orderBy($request->sort_name_price,$request->sort_asc_desc)->get();
    //     }
    //     elseif (isset($request->category))
    //     {
    //         $product=Product::whereIn('category_id',$request->category)->where('is_deleted',0)->where('status',1)->whereBetween('price', [$request->min_price, $request->max_price])->orderBy($request->sort_name_price,$request->sort_asc_desc)->get();
    //     }
    //     elseif (isset($request->colour))
    //     {

    //         $product=Product::whereIn('color_id',$request->colour)->where('is_deleted',0)->where('status',1)->whereBetween('price', [$request->min_price, $request->max_price])->orderBy($request->sort_name_price,$request->sort_asc_desc)->get();
    //     }
    //     else
    //     {
    //         $product=Product::where('is_deleted',0)->where('status',1)->whereBetween('price', [$request->min_price, $request->max_price])->orderBy($request->sort_name_price,$request->sort_asc_desc)->get();
    //     }

           

    //         return view('frontview.gridView', compact('product'));
            
    //     }





// public function getrangeajax(Request $request)
//     {   
//         // $products=Product::get();
//         // dd($products);
//        if(!empty($request->tmp_category))
//        {
//         $tmp_category = $request->tmp_category;
//         $tmp_category = str_replace("|",",",$tmp_category);
//         $cat_arr = explode(',',$tmp_category);
//          $remove = array_pop($cat_arr);  
//         // dd($cat_arr);


//             if(!empty($request->tmp_colour))
//             {
//                 $tmp_colour = $request->tmp_colour;
//                 $tmp_colour = str_replace("|",",",$tmp_colour);
//                 $clr_arr = explode(',',$tmp_colour);
                
//                 $products=Product::where('is_deleted',0)->where('status','1')->wherein('category_id',$cat_arr)->wherein('colour_id',$clr_arr)->whereBetween('price', [$request->min_price, $request->max_price])->get();

//             }else{
//                 $products=Product::where('is_deleted',0)->where('status','1')->wherein('category_id',$cat_arr)->whereBetween('price', [$request->min_price, $request->max_price])->get();
//             }
//        }
//        else{
//             if(!empty($request->tmp_colour)){
//                 $tmp_colour = $request->tmp_colour;
//                 $tmp_colour = str_replace("|",",",$tmp_colour);
//                 $clr_arr = explode(',',$tmp_colour);
//                 $products=Product::where('is_deleted',0)->where('status','1')->wherein('colour_id',$clr_arr)->whereBetween('price', [$request->min_price, $request->max_price])->get();
            
//             }else{
//                 $products=Product::where('is_deleted',0)->where('status','1')->whereBetween('price', [$request->min_price, $request->max_price])->get();
                
//                 // print_r($products);
//                 // exit;

//             }
            
        
//        }
//         //$products=DB::table('products')->where('is_deleted',0)->where('status','active')->whereBetween('price', [$request->min_price, $request->max_price])->get();
//        dd($products);
//        $category = Category::where('is_deleted',0)
//                          ->where('status',1)->get();
//         $colour=Colour::where('is_deleted',0)
//                         ->where('status',1)->get();
        
//         // return view('frontview.list',compact('products','category','colour'));
//     }
    
