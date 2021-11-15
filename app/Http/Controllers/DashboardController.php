<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminlogininfo;

class DashboardController extends Controller
{
    public function Dashboard()
    {
        $data=Adminlogininfo::all();

        return view('pages.dashboard',['data'=>$data]);
    }
//     public function Showdata()
//     {
//         $data=Adminlogininfo::all();

//         return view('table.table',['data'=>$data]);
//     }
}
