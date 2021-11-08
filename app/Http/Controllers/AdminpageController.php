<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminpageController extends Controller
{
    public function Adminpage()
    {
            return view ('pages.adminpage');
    }
}
