<?php

namespace App\Modules\Product\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Modules\Category\Models\Category;
use App\Modules\Colour\Models\Colour;
use App\Modules\Product\Models\Product;
use App\Models\Multipleimage;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $data=Product::where('is_deleted',0)->get();

    	return view('Product::index',['product'=>$data]);
    }

    public function edit($id)
    {

    $product = Product::find($id);
    $images=Multipleimage::where('product_id',$id)->get();
    return view('Product::edit', compact('product','images'));
    }

    public function changestatus(Request $request)
    {
        $status= Product::find($request->id);
        $status->status=$request->status;
        $status->save();
        return response($request);
    }

    public function formdata(){
        $category = Category::where('is_deleted',0)
                   ->where('status',1)->get();            
        $colour=Colour::where('is_deleted',0)
                    ->where('status',1)->get();
        return view ('Product::add',compact('category','colour'));

    }
    public function update(request $request, $id)
    {
        $request-> validate([
            'price'=> 'required |numeric',
            'stock'=> 'required | numeric',
        ]);
        $product = Product::find($id);
        $product->name=$request->name;
        $product->url=$request->url;
        $product->price = $request->price;
        $product->stock = $request->stock;
        $product->upc = $request->upc;
        $product->discription = $request->Description;
        if($request->hasfile('image'))
        {
            $destination = "uploads/products/".$product->image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file=$request->file('image');
            $extension=$file->getclientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/products/',$filename);
            $product->image=$filename;
        }
        if($request->hasFile('subimage'))
         {
             foreach($request->file('subimage')as $key=>$insert)
             {
                 $imageName=time().'-'.$insert->getClientoriginalName();
                 $insert->move('/uploads/products/',$imageName);
                 $save_sub_image=[

                     'product_id' =>$product->id,
                     'image' => $imageName,
                     'sort'=>$request->input('sort')[$key],

                 ];
                 DB::table('multipleimage')->update($save_sub_image);
             }
             
         }
         
         $product-> update();
         return back()->with('success','Item Updated successfully!');
         $data=Product::all();
    }

    public function getdata(Request $request)
    {
        $request-> validate([
            'name'=>'required | min:3| max:100 |unique:product',
            'image'=>'required | image |mimes:png,jpg,svg ',
           // 'url'=>'required',
            'colour'=>'required',
            'category'=>'required',
            'price'=> 'required |numeric',
            'stock'=> 'required | numeric',
            'upc'=> 'required |min:12|max:12',
            //'discription'=> 'required',
        ]);
        
        $status = 1;
        
        $path = $request->file('image')->store('uploads/products');
        // dd($path);

         $user_id = Auth::user()->id;
         $product =new Product;
         $product->name=$request->name;
         $product->user_id=$user_id;
         $product->url=$request->url;
         $product->status =$status;
         $product->colour_id =$request->colour;
         $product->category_id =$request->category;
         $product->is_deleted=0;
         
         if ($request->hasfile('image')){
             $file =$request->file('image');
             $extension= $file->getclientOriginalExtension();
             $filename= time() . '.' .$extension;
             $file->move('uploads/products/',$filename);
             $product->image=$filename;
         }else{
             return $request;
             $product->image= '';
         }
         $product->path = $path;
         $product->price = $request->price;
         $product->stock = $request->stock;
         $product->upc = $request->upc;
         $product->discription = $request->Description;
         $product-> save();
        
         if($request->hasFile('subimage'))
         {
             foreach($request->file('subimage')as $key=>$insert)
             {
                 $imageName=time().'-'.$insert->getClientoriginalName();
                 $insert->move('uploads/products',$imageName);
                 $save_sub_image=[

                     'product_id' =>$product->id,
                     'image' => $imageName,
                     'sort'=>$request->input('sort')[$key],

                 ];
                 DB::table('multipleimage')->insert($save_sub_image);
             }
             
         }
         
         return back()->with('success','Item created successfully!');
         $data=Product::all();
    }
    function deletedata($id)
    {
        Product::where('id',$id)->update(['is_deleted'=>1]);
        return redirect('/product')->with('success','Item deleted successfully!');
        $data=Product::all();
    } 

    function showtrash()
    {
    $product = Product::where('is_deleted',1)->get();
    return view('Product::trash',['product'=>$product]);
    }

    function restoretrash($id)
    {
        Product::where('id',$id)->update(['is_deleted'=> 0]);
        return redirect('/product/trash')->with('success','Item restore successfully!');
        $data=Product::all();
    }

    function restore_data(Request $request)
    {
        $product = Product::find($request->id);
        $product->is_deleted = 0;
        $product->save();
        return response($product);
    }
}
