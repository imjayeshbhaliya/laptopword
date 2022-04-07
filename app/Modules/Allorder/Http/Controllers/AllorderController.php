<?php

namespace App\Modules\Allorder\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orders;
use App\Models\Order_details;
use App\Models\User;


class AllorderController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $order = Orders::get();
        return view("Allorder::welcome",compact('order'));
    }
    public function users()
    {
        $users = User::get();
        return view("Allorder::users",compact('users'));
    }
    public function invoice($id)
    {
        $order = Orders::where('id',$id)->get();
        $Order_details = Order_details::where('order_id',$id)->get();
        return view("Allorder::invoice",compact('order','Order_details'));
    }
    public function edit($id)
    {
        $order = Orders::find($id);
        return view('Allorder::edit', compact('order'));
    }
    public function update(request $request,$id)
    {
        Orders::where('id',$id)->update(['order_status'=>$request->order_status]);
        return redirect('/admin/allorder/')->with('success','Item Updated successfully!');
        $data=Orders::all();
    }
    
}
