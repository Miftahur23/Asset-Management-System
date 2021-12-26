<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function SignUpForm()
    {
        return view('admin.user.usersignup');
    }

    public function Store(Request $req)
    {
        // dd($req->all());
        $req->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
        ]);

        $user=User::create([
            'name'=>$req->name,
            'email'=>$req->email,
            'password'=>bcrypt($req->password),
            'usertype_id'=>$req->usertype_id
         ]);

         Auth::login($user);

         return redirect()->route('Homepage');
    }

    public function Logout()
    {
        $user=Auth::user();
        Auth::logout($user);
        return redirect()->route('firstloginpage')->with('logoutmessage','Logged Out');
    }

    public function AdminLogin()
    {
        
        return view('admin.user.adminlogin');
        
    }

    public function UserLogin()
    {
        
        return view('admin.user.userlogin');
    }

    public function LoggedIn(Request $req)
    {
        // @dd($req->all());


        if( Auth::attempt([ 'email'=>$req->email,'password'=>$req->password]))
        {

            //dd(Auth::user()->id);

            if(Auth::user()->role=='admin')
            {

                return redirect()->route('Homepage')->with('loginmessage','Logged In');
                
            }

            return redirect()->route('EmployeeHomepage')->with('loginmessage','Logged In');
        }  
        else
        {
            return redirect()->back()->with('invalid','Invalid Username or Password');
        }
    }

    public function UserLoggedIn(Request $req)
    {
        // @dd($req->all());

        if( Auth::attempt([ 
            'email'=>$req->email,
            'password'=>$req->password
            ]))

        {
            return redirect()->route('EmployeeHomepage');
        }  
        else
        {
            return redirect()->back();
        }

        
    }
    
}    
