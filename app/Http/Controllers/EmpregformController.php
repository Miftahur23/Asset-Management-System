<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmployeeInfo;
use App\Models\Branch;



class EmpregformController extends Controller
{
    public function Empregform()
    {
        $branches=Branch::all();
        return view ('pages.employee.empregform', compact ('branches'));
    }
    public function AlreadyHaveAnAccount()
    {
       return redirect()->route('Login');
    }
    public function Empregdone(Request $empinfo)
    {
        //dd($empinfo->all());
        
        $empinfo->validate([
            'fname'=>'required',
            'lname'=>'required'

        ]);

        EmployeeInfo::create([
            'fname'=>$empinfo->fname,
            'lname'=>$empinfo->lname,
            'email'=>$empinfo->email,
            'password'=>$empinfo->password,
            'password1'=>$empinfo->password1,
            'deptarment'=>$empinfo->dept,
            'branches_id'=>$empinfo->branchesid,
            'address'=>$empinfo->address,
            'pnumber'=>$empinfo->pnumber
        ]);

        return redirect('/admin/employeelist')->with('success', 'Emplopyee Registered');
    }
}
