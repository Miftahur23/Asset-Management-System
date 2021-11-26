<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminlogininfo;
use App\Models\AssetInfo;
use App\Models\Product;
use App\Models\EmployeeInfo;
use App\Models\Emplogininfo;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Stock;


class AdminController extends Controller
{
    public function Adminloginpage()
    {
        return view ('pages.admin.adminloginpage');
    }

    
    public function ShowBranch()
    {
        $branches=Branch::all();
        return view ('pages.branch.branchlist', compact ('branches'));
    }


    public function CreateBranch()
    {
       
         //return redirect('/home');
        return view ('pages.branch.branchform');
    }

    public function StoreBranch(Request $req)
    {
       // dd($req->all());
        $req->validate([
            'name'=>'required',
            'location'=>'required'

        ]);

        Branch::create([
            'name'=>$req->name,
            'location'=>$req->location
         ]);

         return redirect()->back()->with('success', 'Branch Added');
    }

    public function ShowDepartment()
    {
        $dept=Department::all();
        return view ('pages.department.departmentlist', compact('dept'));
    }
    

    public function CreateDepartment()
    {
        return view ('pages.department.deptform');
    }

    public function StoreDepartment(Request $req)
    {
        $req->validate([
            'dname'=>'required'
        ]);

        Department::create([

            'dname'=>$req->dname

        ]);

        return redirect()->back()->with('success', 'Department Added');
    }

    public function ShowRequest()
    {
        return 'ok';
    }
    
    // public function CreateRequest()
    // {
    //     return 'ok';
    // }

    // public function StoreRequest()
    // {
    //     return 'ok';
    // }

    public function ShowStock()
    {
        return 'ok';
    }

    public function CreateStock()
    {
        return 'ok';
    }

    public function StoreStock()
    {
        return 'ok';
    }

    public function AssetCreated()
    {
        $emp= EmployeeInfo::all();
        return view ('pages.asset.assetform', compact('emp'));
    }

    public function Adminlogininfo(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        Adminlogininfo::create([
                'email'=>$request->email,
                'password'=>$request->password 
             ]);
        
             return redirect('/home');

    }
//     public function ProductForm()
//     {
//         return view('pages.productsform');
//     }

//     public function ProductEntry(Request $req){

//         Product::create([

//             'name'=>$req->productName,
//             'price'=>$req->price
//         ]);

// return redirect('/home');
//     }

    public function Assetinfo(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'asset_name'=>'required',
            'asset_id'=>'required',
            'category'=>'required',
            'quantity'=>'required',
            'cost'=>'required',
            'purchased_date'=>'required',
            'serial_no'=>'required'

        ]);

        Assetinfo::create([
                  'asset_name'=>$request->asset_name,
                  'asset_id'=>$request->asset_id,
                  'category'=>$request->category,
                  'quantity'=>$request->quantity, 
                  'cost'=>$request->cost,
                  'purchased_date'=>$request->purchased_date,
                  'description'=>$request->description,
                  'serial_no'=>$request->serial_no,
                  'employeeinfos_id'=>$request->empid, 
               ]);
        
               return redirect()->route('show.asset')->with('success', 'Asset Created Successfully');

        // return redirect()->back();
        // return $request->only(['name','email']);
        // return $request->except('name');

        // echo $request->input('name');
        // echo '<br/>';
        // echo $request->input('password');

        // return 'ok';
    }

    public function ShowAsset(){
        
        //dd($data);

        $data=Assetinfo::all();
        
        return view ('pages.asset.assetlist', compact('data'));

    }

    
    public function ShowAssetCondition(){
        
        return 'ok';

    }

    public function ShowEmpinfo(){

        //dd($data);
        $data=EmployeeInfo::all();

        return view('pages.employee.emplist', compact ('data'));

    }

    public function ShowEmploginfo(){

        //dd($data);
        $data=Emplogininfo::all();

        return view('pages.employee.emplogininfo', compact ('data'));

    }
    
}
