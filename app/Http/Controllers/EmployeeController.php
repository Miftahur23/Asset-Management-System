<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetInfo;
use App\Models\EmployeeInfo;
use App\Models\Branch;
use App\Models\Department;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class EmployeeController extends Controller
{

    public function EmpHomepage()
    {
        
        return redirect()->route('show.asset');
    }

    public function Empregform()
    {
        $branches=Branch::all();
        $departments=Department::all();
        return view ('admin.employee.empregform', compact ('branches','departments'));
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
            'lname'=>'required',
            'email'=>'email:rfc,dns'

        ]);


            $image_name=null;

                //checking if image exist in this request.

                 if($empinfo->hasFile('employee_image'))
                 {
                     //generating file name
                     $image_name=date('Ymdhis') .'.'. $empinfo->file('employee_image')->getClientOriginalExtension();

                     //storing into project directory

                     $empinfo->file('employee_image')->storeAs('/employee',$image_name);

                 }

                 User::create([
                    'email'=>$empinfo->email,
                    'name'=>$empinfo->fname,
                    'password'=>bcrypt($empinfo->password)
                 ]);

                 //why this

                 $lastuser=User::orderBy('created_at','desc')->first();
                 //$user=User::where('id',$lastuser)->get();
                 //dd($lastuser);


        EmployeeInfo::create([
            'employee_image'=>$image_name,
            'user_id'=>$lastuser->id,
            'fname'=>$empinfo->fname,
            'lname'=>$empinfo->lname,
            'email'=>$empinfo->email,
            'password'=>$empinfo->password,
            'password1'=>$empinfo->password1,
            'departments_id'=>$empinfo->departments_id,
            'branches_id'=>$empinfo->branches_id,
            'address'=>$empinfo->address,
            'pnumber'=>$empinfo->pnumber
        ]);

        return redirect('/admin/employeelist')->with('success', 'Emplopyee Registered');
    
    
    }

    public function Profile()
    {

        $profile=EmployeeInfo::where('user_id',Auth::user()->id)->first();
        return view('admin.employee.profile',compact('profile'));
    }

    


}


