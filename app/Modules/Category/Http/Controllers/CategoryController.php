<?php

namespace App\Modules\Category\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Category\Models\Category;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller

{
         public function welcome()
        {
            $data=category::where('is_deleted',0)->get();
    
            return view('Category::index',['category'=>$data]);
        }

        public function edit($id)
        {
        $category = Category::find($id);
        return view('Category::edit', compact('category'));
        }

        public function update(request $request, $id)
        {
        $request-> validate([
            'name'=>'required |alpha|min:3|unique:category|max:10|regex:/^\S*$/u',
        ]);

        $category = Category::find($id);
        $category->name=$request->name;
        $category-> update();
        $data=Category::all();
        return back()->with('success','Item created successfully!');   

    }

      
    
        public function changeStatus(Request $request)
        {
            $status= Category::find($request->id);
            $status->status=$request->status;
            $status->save();
        }
    
        public function formdata(){
            return view('Category::add');
        }
        public function getdata(Request $request){
            $request-> validate([
                'name'=>'required |alpha|unique:category|regex:/^\S*$/u',
                
            ]);
            $status = $request->status;
            if($status == 'Inactive'){
                $status = 0;
            }else{
                $status = 1;
            }
    
            $user_id = Auth::user()->id;
            // dd($user_id);
             $category =new Category;
            
             $category->name=$request->name;
             $category->user_id=$user_id;
             $category->status=$status;
             $category-> is_deleted=0;
             $category-> save();
             return back()->with('success','Item created successfully!');   
             $data=category::all();    
        }
        
    function deletedata($id)
    {
        Category::where('id',$id)->update(['is_deleted'=>'1']);
        return redirect('/category')->with('success','Item Updated successfully!');
        $data=Category::all();
         

    } 
        function showtrash()
    {
    $category = Category::where('is_deleted',1)->get();
    return view('Category::trash',['category'=>$category]);
    }
    function restoretrash($id)
    {
        Category::where('id',$id)->update(['is_deleted'=> 0]);
        return redirect('/category/trash')->with('success','Item restore successfully!');
        $data=Category::all();
    }

    

    function Restoreall(Request $request)
    {
        
            $category = Category::find($request->id);
            $category->is_deleted=0;
            $category->save();
            return response('$category');
    }          
}