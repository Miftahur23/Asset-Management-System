<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function Signup()
    {
        return view('pages.signupform');
    }

    public function AlreadyHaveAnAccount()
    {
       return redirect()->route('Login');
    }
}
