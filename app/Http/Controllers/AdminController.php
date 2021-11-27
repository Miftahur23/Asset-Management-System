<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminlogininfo;
use App\Models\AssetInfo;
use App\Models\Category;
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

         return redirect()->route('show.branch')->with('success', 'Branch Added');
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

        return redirect()->route('show.department')->with('success', 'Department Added');
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


    public function AssetCreated()
    {
        $category= Category::all();
        return view ('pages.asset.assetform', compact('category'));
    }

    public function Assetinfo(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'asset_name'=>'required',
            'asset_id'=>'required',
            'quantity'=>'required',
            'cost'=>'required',
            'purchased_date'=>'required',
            'serial_no'=>'required'

        ]);

                $image_name=null;

                //checking if image exist in this request.

                 if($request->hasFile('product_image'))
                 {
                     //generating file name
                     $image_name=date('Ymdhis') .'.'. $request->file('product_image')->getClientOriginalExtension();

                     //storing into project directory

                     $request->file('product_image')->storeAs('/products',$image_name);

                 }

        Assetinfo::create([
                  'asset_name'=>$request->asset_name,
                  'asset_id'=>$request->asset_id,
                  'quantity'=>$request->quantity, 
                  'cost'=>$request->cost,
                  'purchased_date'=>$request->purchased_date,
                  'description'=>$request->description,
                  'serial_no'=>$request->serial_no,
                  'categories_id'=>$request->categoriesid, 
                  'image'=>$image_name
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



    public function ShowCategory()
    {
        $categories=Category::all();
        return view ('pages.category.categorylist', compact ('categories'));
    }


    public function CreateCategory()
    {
       
         //return redirect('/home');
        return view ('pages.category.categoryform');
    }

    public function StoreCategory(Request $req)
    {
       // dd($req->all());
        $req->validate([
            'name'=>'required',
            'details'=>'required'

        ]);

        Category::create([
            'name'=>$req->name,
            'details'=>$req->details
         ]);

         return redirect()->route('show.category')->with('success', 'Category Added');
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
