<?php

namespace App\Modules\Colour\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Colour\Models\Colour;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class ColourController extends Controller
{

    public function welcome()
    {
        $data=colour::where('is_deleted',0)->get();

    	return view('Colour::index',['colour'=>$data]);
    }
    public function edit($id)
    {
    $colour = Colour::find($id);
    return view('Colour::edit', compact('colour'));
    }
    public function update(request $request, $id)
    {
        $request-> validate([
            'name'=>'required |alpha|unique:colour|regex:/^\S*$/u',
        ]);

       $colour = Colour::find($id);
        $colour->name=$request->name;
        $colour-> update();
        $data=Colour::all();
        return back()->with('success','Item created successfully!');   

    }


    public function changestatus(Request $request)
    {
        // dd("test") ; 
        $status= Colour::find($request->id);
        $status->status=$request->status;
        $status->save();
    }

    public function formdata(){
        return view('Colour::add');
    }
    public function getdata(Request $request){
        $request-> validate([
            'name'=>'required |alpha|unique:colour|regex:/^\S*$/u',
        ]);
        
        $status = $request->status;
        if($status == 'inactive'){
            $status = 0;
        }else{
            $status = 1;
        }

        $user_id = Auth::user()->id;
        
         $colour =new Colour;
      
         $colour->name=$request->name;
         $colour->user_id=$user_id;
         $colour->status=$status;
         $colour->is_deleted=0;
         $colour-> save();
         return back()->with('success','Item created successfully!');   
        
         $data=colour::all();
    
    }
    function deletedata($id)
    {
        Colour::where('id',$id)->update(['is_deleted'=>'1']);
        return redirect('/colour')->with('success','Item Updated successfully!');
        $data=Colour::all();
    } 
    
    function showtrash()
    {
    $colour = Colour::where('is_deleted',1)->get();
    return view('Colour::trash',['colour'=>$colour]);
    }

    function restoretrash($id)
    {
       Colour::where('id',$id)->update(['is_deleted'=> 0]);
        return redirect('/colour/trash')->with('success','Item restore successfully!');
        $data=Colour::all();
    }

    function Restoreall(Request $request)
    {
        // $colour = Colour::find($request->id);
        // $colour->delete();
        $colour = Colour::find($request->id);
        $colour->is_deleted=0;
        $colour->save();
        return response('$colour');
    }
     
}