<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function SignUpForm()
    {
        return view('pages.user.usersignup');
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
            'password'=>bcrypt($req->password)
         ]);

         Auth::login($user);

         return redirect()->route('Homepage');
    }

    public function Logout()
    {
        $user=Auth::user();
        Auth::logout($user);
        return redirect()->route('Firstpage');
    }

    public function Login()
    {
        
        return view('pages.user.login');
    }

    public function LoggedIn(Request $req)
    {
        // @dd($req->all());

        if( Auth::attempt([ 'email'=>$req->email,'password'=>$req->password]))
        {

            return redirect()->route('Homepage');
        }  
        else
        {
            return redirect()->back();
        }
    }
}    
