<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function Adminloginpage()
    {
        return view ('pages.adminloginpage');
    }
    public function AssetCreated()
    {
        return view ('pages.assetform');
    }
    
}
