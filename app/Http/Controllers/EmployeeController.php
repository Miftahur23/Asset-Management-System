<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssetInfo;
use App\Models\EmployeeInfo;
use App\Models\Branch;
use App\Models\Department;

class EmployeeController extends Controller
{

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
            'lname'=>'required'

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

        EmployeeInfo::create([
            'employee_image'=>$image_name,
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

    public function EmpShowAsset(){
        
        //dd($data);

        $empassetdata=AssetInfo::all();
        
        return view ('employee.asset.assetlist', compact('empassetdata'));

    }


}


