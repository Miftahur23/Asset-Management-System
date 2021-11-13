<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Emplogininfo;

class EmploginpageController extends Controller
{
    public function Emploginpage()
    {
        return view ('pages.emploginpage');
    }
    public function Emplogininfo(Request $request)
    {
        //dd($request->all());

         Emplogininfo::create([
               'name'=>$request->name,
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


