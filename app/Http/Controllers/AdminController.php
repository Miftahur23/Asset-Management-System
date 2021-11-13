<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminlogininfo;

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

          return redirect()->back();
        // return $request->only(['name','email']);
        // return $request->except('name');

        // echo $request->input('name');
        // echo '<br/>';
        // echo $request->input('password');

        
        // return 'ok';
    }
    
}
