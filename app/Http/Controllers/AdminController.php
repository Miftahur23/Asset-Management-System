<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminlogininfo;
use App\Models\AssetInfo;
use App\Models\Category;
use App\Models\Product;
use App\Models\Req;
use App\Models\EmployeeInfo;
use App\Models\Distribution;
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

    public function EditBranch($edit)
    {
        //dd($edit);
        $br=Branch::find($edit);
        return view ('admin.branch.edit',compact('br'));
    }

    public function EditedBranch($edit)
    {
        

        $br=Branch::find($edit);
        $br->update(request()->all());
        return redirect()->route('show.branch')->with('edited','Branch Edited Successfully');
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

    public function ViewRequest()
    {

            return view('admin.request.confirmreq');

        }
    

    // public function ConfirmRequest(Request $req, $id)
    // {
    //     Req::find($id)->update([
    //         'status'=>$request->status
    //     ]);

    //     return view('admin.request.confirmreq');
    // }

    


    public function ShowDistribution()
    {
        $distasset=Distribution::all();
        return view('admin.distribution.distlist', compact('distasset'));
    }

    public function CreateDistribution()
    {
        $branches=Branch::all();
        $departments=Department::all();
        return view('admin.distribution.distform', compact ('branches','departments'));
    }
        

    public function StoreDistribution(Request $request)
    {
        $request->validate([
            'asset_name'=>'required',
            'quantity'=>'required',
            'departments_id'=>'required',
            'branches_id'=>'required'
        ]);

        Distribution::create([
                'asset_name'=>$request->asset_name,
                'quantity'=>$request->quantity,
                'departments_id'=>$request->departments_id,
                'branches_id'=>$request->branches_id
             ]);
        
             return redirect()->route('show.distribution')->with('success', 'Asset Distributed Successfully');
            
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
            'cost'=>'required',

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
                  'cost'=>$request->cost,
                  'description'=>$request->description,
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

        $assetdata=Assetinfo::all();
        
        return view ('admin.asset.assetlist', compact('assetdata'));

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

    

    public function EditAsset($editasset)
    {
        $edit=AssetInfo::find($editasset);

        //return redirect()->back()->with('delete', 'Asset deleted');
        $category= Category::all();
        return view('admin.asset.edit', compact('category'), compact('edit'));
    }

    public function EditedAsset($editasset)
    {
        $edit=AssetInfo::find($editasset);

        $image_name=$edit->image;

                //checking if image exist in this request.

                 if($request->hasFile('product_image'))
                 {
                     //generating file name
                     $image_name=date('Ymdhis') .'.'. $request->file('product_image')->getClientOriginalExtension();

                     //storing into project directory

                     $request->file('product_image')->storeAs('/products',$image_name);

                 }


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

    public function DeleteEmployee($delete_id)
    {
        $delete=EmployeeInfo::find($delete_id)->delete();

        return redirect()->back()->with('delete', 'Employee Removed');
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


