<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class HomeController extends Controller
{
    public function Homepage()
    {
        return view ('admin.homepage');
    }

    public function EmployeeHomepage()
    {
        return view('employee.master');
    }

    public function Firstpage()
    {
        return view ('admin.firstpage');
    }

    public function AccountStore(Request $request)
    {
        dd($request->all());
        // Account::create([

        //      'name'=>$request->name,
        //      'email'=>$request->email,
        //      'password'=>$request->password
            
        //  ]);

        // return redirect()->back();
    }
}
