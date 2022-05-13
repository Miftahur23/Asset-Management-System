<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class HomeController extends Controller
{
    public function Homepage()
    {
        return view ('admin.homepage');
    }

    // public function EmployeeHomepage()
    // {
    //     return view('employee.master');
    // }

    public function Firstpage()
    {
        return view ('admin.firstpage');
    }

    public function changeLanguage($locale)
    {
        App::setLocale($locale);
        session()->put('applocale', $locale);

        return redirect()->back();
    }

    
}
