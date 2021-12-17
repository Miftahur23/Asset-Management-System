<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminlogininfo;
use App\Models\AssetInfo;
use App\Models\Category;
use App\Models\Product;
use App\Models\Req;
use App\Models\EmployeeInfo;
use App\Models\Emplogininfo;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Stock;


class AdminController extends Controller
{
    public function Adminloginpage()
    {
        return view ('admin.login.adminloginpage');
    }

    public function Dashboard()
    {
        return view ('admin.dashboard');
    }


    
    public function ShowBranch()
    {
        $branches=Branch::all();
        return view ('admin.branch.branchlist', compact ('branches'));
    }


    public function CreateBranch()
    {
       
         //return redirect('/home');
        return view ('admin.branch.branchform');
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

    public function DelBranch($delbranch)
    {
        Branch::find($delbranch)->delete();

        return redirect()->back()->with('delete', 'Branch Deleted');
    }

    public function ShowDepartment()
    {
        $departments=Department::all();
        return view ('admin.department.departmentlist', compact('departments'));
    }
    

    public function CreateDepartment()
    {
        return view ('admin.department.deptform');
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

    public function DelDepartment($deldept)
    {
        Department::find($deldept)->delete();
        return redirect()->back()->with('delete', 'Department Deleted');
    }

    

    public function ShowRequest()
    {
        $data= Req::all();
        return view('admin.request.reqlist', compact ('data'));
    }

    public function CreateRequest()
    {
        return view('admin.request.reqform');
    }

    public function StoreRequest(Request $req)
    {
        //dd($req->all());
         $req->validate([
             'name'=>'required',
             'quantity'=>'required'
 
         ]);
 
         Req::create([
             'asset_name'=>$req->name,
             'quantity'=>$req->quantity
          ]);
 
          return redirect()->route('show.reqlist')->with('success', 'Asset Requested');
    }


    public function ShowDistribution()
    {
        return view('admin.distribution.distlist');
    }

    public function ShowPurchase()
    {
        return view('admin.purchase.purchaselist');
    }
    

    public function ShowActiveStock()
    {
        return view('admin.stock.activestock');
    }

    public function ShowDamageStock()
    {
        return view('admin.stock.damagestock');
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


    public function AssetCreated()
    {
        $category= Category::all();
        return view ('admin.asset.assetform', compact('category'));
    }

    public function Assetinfo(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'asset_name'=>'required',
            'asset_id'=>'required',
            'quantity'=>'required',
            'cost'=>'required',
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
        
        return view ('admin.asset.assetlist', compact('data'));

    }

    public function DetailsAsset($details_id){
        
        //dd($data);

        $details=AssetInfo::find($details_id);
        
        return view ('admin.asset.assetdetails',compact('details'));

    }


    

    public function DeleteAsset($delasset)
    {
        AssetInfo::find($delasset)->delete();

        return redirect()->back()->with('delete', 'Asset deleted');
    }

    

    public function EmpShowAsset(){
        
        //dd($data);

        $data=Assetinfo::all();
        
        return view ('employee.asset.assetlist', compact('data'));

    }

    public function ShowCategory()
    {
        $categories=Category::all();
        return view ('admin.category.categorylist', compact ('categories'));
    }


    public function CreateCategory()
    {
       
         //return redirect('/home');
        return view ('admin.category.categoryform');
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

    public function DeleteCategory($delcategory){
        
        Category::find($delcategory)->delete();

        return redirect()->back()->with('delete', 'Category Deleted');

    }



    
    public function ShowAssetCondition(){
        
        return 'ok';

    }

    public function ShowEmpinfo(){

        //dd($data);
        $data=EmployeeInfo::all();

        return view('admin.employee.emplist', compact ('data'));

    }

    public function DetailsEmployee($details_id)
    {
        $details=EmployeeInfo::find($details_id);

        return view ('admin.employee.empdetails', compact('details'));
    }


    public function ShowEmploginfo(){

        //dd($data);
        $data=Emplogininfo::all();

        return view('admin.employee.emplogininfo', compact ('data'));

    }

    public function ShowReport() {

        return 'report';
    }
    
}


