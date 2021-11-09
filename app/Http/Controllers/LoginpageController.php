<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginpageController extends Controller
{
    public function Loginpage()
    {
        return view ('pages.loginpage');
    }
}
