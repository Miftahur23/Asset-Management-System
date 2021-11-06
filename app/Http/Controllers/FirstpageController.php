<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstpageControlelr extends Controller
{
    public function Firstpage()
    {
        return view('pages.firstpage');
    }
}
