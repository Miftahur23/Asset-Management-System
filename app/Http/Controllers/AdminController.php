<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminlogininfo;
use App\Models\AssetInfo;

class AdminController extends Controller
{
    public function Adminloginpage()
    {
        return view ('pages.adminloginpage');
    }
    public function AssetCreated()
    {
        return view ('pages.assetform');
    }

    public function Adminlogininfo(Request $request)
    {
        //dd($request->all());

        Adminlogininfo::create([
                'email'=>$request->email,
                'password'=>$request->password 
             ]);
        
             return redirect('/home');

        //  return redirect()->back();
        // return $request->only(['name','email']);
        // return $request->except('name');

        // echo $request->input('name');
        // echo '<br/>';
        // echo $request->input('password');

        
        // return 'ok';
    }

    public function Assetinfo(Request $request)
    {
        dd($request->all());

        // Assetinfo::create([
        //         'asset_name'=>$request->asset_name,
        //         'asset_id'=>$request->asset_id,
        //         'category'=>$request->category,
        //         'quantity'=>$request->quantity, 
        //         'cost'=>$request->cost,
        //         'date_purchased'=>$request->date_purchased,
        //         'description'=>$request->description,
        //         'serial_no'=>$request->serial_no, 
        //      ]);
        
        //      return redirect('/home');

        //  return redirect()->back();
        // return $request->only(['name','email']);
        // return $request->except('name');

        // echo $request->input('name');
        // echo '<br/>';
        // echo $request->input('password');

        
        // return 'ok';
    }
    
}
