<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmpregformController extends Controller
{
    public function Empregform()
    {
        return view ('pages.empregform');
    }
    public function AlreadyHaveAnAccount()
    {
       return redirect()->route('Login');
    }
}
