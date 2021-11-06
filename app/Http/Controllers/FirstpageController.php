<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FirstpageController extends Controller
{
    public function Firstpage()
    {
        return view('pages.firstpage');
    }
}
