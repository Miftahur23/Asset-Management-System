<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use App\Models\Adminlogininfo;
use App\Models\AssetInfo;
use App\Models\Product;
use App\Models\Req;
use App\Models\EmployeeInfo;
use App\Models\Distribution;
use App\Models\Branch;
use App\Models\Department;
use App\Models\Stock;
use App\Models\User;
use App\Models\Report;
use App\Models\DamageReq;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    public function Adminloginpage()
    {
        return view ('admin.login.adminloginpage');
    }

    public function Dashboard()
    {
        $count['employees']=EmployeeInfo::all()->count();
        $count['assets']=AssetInfo::all()->count();
        $count['pendingassetrequests']=Req::where('status','pending')->count();
        $count['pendingdamagerequests']=DamageReq::where('status','pending')->count();
        $count['purchasable']=Req::where('status','Accepted')->count();
        //$count['purchased']=Req::where('status','purchased')->count();
        $count['stock']=Stock::all()->count();

        //dd($count);
        return view ('admin.dashboard',compact('count'));
    }


    
    public function ShowBranch()
    {
        $key=null;
        if(request()->search){
            $key=request()->search;
            $branches = Branch::where('name','LIKE','%'.$key.'%')->get();
            return view('admin.branch.branchlist', compact('branches','key'));
        }
        $branches=Branch::all();
        return view ('admin.branch.branchlist', compact ('branches','key'));
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

        $key=null;
        if(request()->search){
            $key=request()->search;
            $departments = Department::where('dname','LIKE','%'.$key.'%')->get();
            return view('admin.department.departmentlist', compact('departments','key'));
        }

        $departments=Department::all();
        return view ('admin.department.departmentlist', compact('departments','key'));
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

    public function EditDepartment($editt_id)
    {
        //dd($editt_id);
        $edit=Department::find($editt_id);
        return view('admin.department.edit',compact('edit'));
    }

    public function UpdateDepartment($editt_id)
    {
        $edit=Department::find($editt_id);
        $edit->update(request()->all());
        return redirect()->route('show.department')->with('success','Department Updated Successfully');
    }

    public function DelDepartment($deldept)
    {
        Department::find($deldept)->delete();
        return redirect()->back()->with('delete', 'Department Deleted');
    }

    

    public function ShowRequest()
    {

        $key=null;
        if(request()->search){
            $key=request()->search;
            $data = Req::where('requested_by','LIKE','%'.$key.'%')
            ->orWhere('asset_name','LIKE','%'.$key.'%')->get();
            return view('admin.request.reqlist', compact('data','key'));
        }

        
        if(Auth::User()->role=='admin')
        {
            $data= Req::all();

        }
        else
        {
            $data= Req::where('requested_by',Auth::User()->name)->get();
        }
        return view('admin.request.reqlist', compact ('data','key'));
    }

    public function boot()
    {
        Paginator::useBootstrap();
    }

    


    public function CreateRequest($req)
    {

        $request=AssetInfo::find($req);

        //dd($request);

        return view('admin.request.reqform',compact('request'));
    }

    public function StoreRequest(Request $req, $req_id)
    {
        //dd($req->all());
         $req->validate([
             'name'=>'required',
             'quantity'=>'required'
 
         ]);
 
         Req::create([
             'asset_id'=>$req_id,
             'asset_name'=>$req->name,
             'requested_by'=>Auth::user()->name,
             'quantity'=>$req->quantity,
            //  'status'=>"Requested",
          ]);
 
          return redirect()->route('show.asset')->with('success', 'Asset Requested');
    }
    
    

    public function ViewRequest($viewreq)
    {
        $request=Req::find($viewreq);

        if ($request) 
        {
            
            return view('admin.request.confirmreq',compact('request'));

        }
    }
    

    public function ConfirmRequest(Request $viewreq, $id)
    {
        Req::find($id)->update([
            'status'=>$viewreq->status
        ]);

        return view('admin.request.confirmreq');
    }

    public function UpdateAction($action)
    {
        $updateaction=Req::find($action);

        //dd($updateaction->status);
        //dd(request()->all());
        $updateaction->update([
            'status'=>request()->status
        ]);

        return redirect()->back();
    }

    public function CreateDamageRequest ($dam_id)
    {
        $damage=AssetInfo::find($dam_id);
        return view ('admin.request.damreqform',compact('damage'));
    }
    
    public function StoreDamageRequest(Request $request, $dam_id)
    {
        // dd($request->all());
         $request->validate([
             'name'=>'required',
             'quantity'=>'required'
 
         ]);

         $distribution=Distribution::where('asset_id',$dam_id)->first();
 
         DamageReq::create([
             'asset_id'=>$dam_id,
             'distribuition_id'=>$distribution->id,
             'asset_name'=>$request->name,
             'requested_by'=>Auth::user()->name,
             'quantity'=>$request->quantity,
          ]);
 
          return redirect()->back()->with('damage', 'Successfully Requested');
    }
    public function ShowDamageRequest()
    {
        $damage=DamageReq::all();
        return view('admin.request.damreqlist',compact('damage'));
    }

    public function ConfirmDam(Request $damage, $dam_id)
    {
        DamageReq::find($dam_id)->update([
            'status'=>$damage->status
        ]);

        return view('admin.request.confirmdam');

    }

    public function UpdateDamage($damage)
    {

        $updatedamage=DamageReq::find($damage);
        //dd($updatedamage);
        $updatelist =Distribution::find($updatedamage->distribuition_id);
        

        $updatelist->update([
            'quantity'=>$updatelist->quantity-$updatedamage->quantity
        ]);
        //dd($updatelist);

        $updatedamage->update([
            'status'=>request()->status
        ]);


        return redirect()->back();
    }

    


    public function ShowDistribution()
    {
        $distasset=Distribution::all();
       // $stocks=Stock::all();
        return view('admin.distribution.distlist', compact('distasset'));
    }

    public function SelectBranch()
    {
        $branches=Branch::all();
        return view('admin.distribution.selectbranch', compact ('branches'));

    }

    

    public function CreateDistribution(Request $request)
    {
        $employee=EmployeeInfo::where('branches_id',$request->branches_id)->get();
        $branch_id=$request->branches_id;
        $stocks=Stock::all();
        $departments=Department::all();
        return view('admin.distribution.distform', compact ('stocks','departments','employee','branch_id'));
    }
        

    public function StoreDistribution(Request $request,$branches_id)
    {
        //dd($request->all());

        $request->validate([
            'stock_id'=>'required',
            'quantity'=>'required',
            'departments_id'=>'required',
        ]);

        // dd($request->all());
        $quantity=0;
        $stock=Stock::where('asset_id',$request->stock_id)->first();

        //dd($stock->asset_id);

        if($stock->quantity >= $request->quantity)
        {
            //dd($request->all());
            Distribution::create([
                'employee_id'=>$request->employee_id,
                'stock_id'=>$request->stock_id,
                'asset_id'=>$stock->asset_id,
                'quantity'=>$request->quantity,
                'departments_id'=>$request->departments_id,
                'branches_id'=>$branches_id
             ]);

             $quantity=$stock->quantity - $request->quantity;
             $stock->update([
                'quantity'=>$quantity
             ]);
             return redirect()->route('show.distribution')->with('success', 'Asset Distributed Successfully');
            
           
        }
        else
        {
            return redirect()->back()->with('stock','Not enough stock');
        }


        
    }

    public function ShowPurchase()
    {
        $purchase=Req::where('status','Accepted')->orwhere('status','Purchased')->get();
        return view('admin.purchase.purchaselist',compact('purchase'));
    }
    

    public function CreatePurchase()
    {
        $asset=AssetInfo::all();
        return view('admin.purchase.create',compact('asset'));
    }

    public function UpdatePurchase($purchase)
    {
        

        $update=Req::where('id',$purchase)->first();
        
        $update->update([
            'status'=>request()->status
        ]);

        
        // $price=AssetInfo::find($request->asset_id);

        

        $stock=Stock::where('asset_id',$update->asset_id)->first();
        $updateprice=$stock->worth/$stock->quantity;
//dd($updateprice);
        
        $stock->update([
            //'worth'=>$totalquantity*$price->cost,
            'quantity'=>$update->quantity+$stock->quantity,
            'worth'=>($update->quantity+$stock->quantity)*$updateprice
            
        ]);
        return redirect()->back();
    }

    public function ShowActiveStock()
    {
        $stock=Stock::all();
        return view('admin.stock.activestock',compact('stock'));
    }

    public function ShowDamageStock()
    {
        $damstocks=DamageReq::where('status','Accepted')->get();
        return view('admin.stock.damagestock',compact('damstocks'));
    } 

    public function CreateStock()
    {
        
        $asset=AssetInfo::all();
        return view('admin.stock.createstock',compact('asset'));
    }

    public function StoreStock(Request $request)
    {
        $request->validate([
            'asset_id'=>'required',
            'quantity'=>'required',
            'location'=>'required',
        ]);

        $price=AssetInfo::find($request->asset_id);
        //dd($request->all());
        Stock::create([
                'asset_id'=>$request->asset_id,
                'quantity'=>$request->quantity,
                'location'=>$request->location,
                'worth'=>$request->quantity*$price->cost,
             ]);
        
             return redirect()->route('show.active.stock')->with('success', 'Stock Created Successfully');
            
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
        return view ('admin.asset.assetform');
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

        AssetInfo::create([
                  'asset_name'=>$request->asset_name, 
                  'cost'=>$request->cost,
                  'description'=>$request->description,
                  'category'=>$request->category, 
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


        $key=null;
        if(request()->search){
            $key=request()->search;
            $assets = AssetInfo::where('asset_name','LIKE','%'.$key.'%')
                ->orWhere('category','LIKE','%'.$key.'%')
                ->get();
            return view('admin.asset.assetlist',compact('assets','key'));
        }
        $assets = Assetinfo::get();
        return view('admin.asset.assetlist',compact('assets','key'));

    }

    public function AssignedAsset()
    {
        $key=null;
        if(request()->search){
            $key=request()->search;
            $assets = AssetInfo::where('asset_name','LIKE','%'.$key.'%')
                ->orWhere('category','LIKE','%'.$key.'%')
                ->get();
            return view('admin.asset.assigned',compact('assets','key'));
        }

        $assets = Distribution::where('employee_id',auth()->user()->id)->get();
        //dd($assets);
        return view('admin.asset.assigned',compact('assets','key'));
    }

    public function DetailsAsset($details_id){
        

        $details=AssetInfo::find($details_id);

        //dd($details);
        
        return view ('admin.asset.assetdetails',compact('details'));

    }

    public function ShowAssigned($assigned_id){
        

        $assigned=Distribution::find($assigned_id);

        //dd($assigned);
        
        return view ('admin.asset.assigneddetails',compact('assigned'));

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

        return view('admin.asset.edit', compact('edit'));
    }

    public function EditedAsset(Request $request, $editasset)
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

                 $edit->update([
                    'asset_name'=>$request->asset_name, 
                    'cost'=>$request->cost,
                    'description'=>$request->description,
                    'category'=>$request->category, 
                    'image'=>$image_name
                 ]);


                 return redirect()->route('show.asset')->with('success', 'Asset Edited Successfully');

                 


    }

    
    public function ShowAssetCondition(){
        
        return 'ok';

    }

    public function ShowEmpinfo(){

        //dd($data);

        $key=null;
        if(request()->search){
            $key=request()->search;
            $data = EmployeeInfo::where('fname','LIKE','%'.$key.'%')
            ->Orwhere('lname','LIKE','%'.$key.'%')
            ->get();
            return view('admin.employee.emplist', compact('data','key'));
        }
        $data=EmployeeInfo::all();
        return view('admin.employee.emplist', compact ('data','key'));

    }

    public function ShowEmpLoginInfo(){

        //dd($data);
        $data=User::where('role','!=','admin')->get();
        return view('admin.employee.logininfo', compact ('data'));

    }

    public function DetailsEmployee($details_id)
    {
        $details=EmployeeInfo::find($details_id);
        return view ('admin.employee.empdetails', compact('details'));
    }

    public function EditEmployee($edit_iddd)
    {
        $edit=EmployeeInfo::find($edit_iddd);
        $department=Department::all();
        $branch=Branch::all();

        return view('admin.employee.edit', compact('edit','department','branch'));
    }

    public function UpdateEmployee(Request $request, $update_iddd)
    
    {
        $edit=EmployeeInfo::find($update_iddd);

        $image_name=$edit->employee_image;

        if($request->hasFile('employee_image'))

        {

            $image_name=date('Ymdhis').'.'. $request->file('employee_image')->getClientOriginalExtension();

            $request->file('employee_image')->storeAs('/employee',$image_name);
        }

        $edit->update([

            'employee_image'=>$image_name,
            'fname'=>$request->fname,
            'lname'=>$request->lname,
            'departments_id'=>$request->departments_id,
            'branches_id'=>$request->branches_id,
            'address'=>$request->address,
            'pnumber'=>$request->pnumber

        ]);

        return redirect()->route('show.emplist')->with('success', 'Employee Information Updated');
    }

    public function DeleteEmployee($delete_id)
    {
        $delete=EmployeeInfo::find($delete_id)->delete();

        return redirect()->back()->with('delete', 'Employee Removed');
    }


    


    

    public function ShowReport() 
    {
        $reports=[];
        if(request()->has('fromdate'))
        {
            $from_date=request()->fromdate;
            $to_date=request()->todate;
            
            $reports=Stock::where('worth','>=',5000)->whereBetween('created_at',[$from_date,$to_date])->get();

        // $reports=Stock::where('worth','>=',30000)
        // ->whereDate('created_at','>=',$from_date)
        // ->whereDate('created_at','<=',$to_date)
        // ->get();
        }

        // $reports= AssetInfo::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
        //     ->get();

        // $reports= AssetInfo::whereMonth('created_at', date(format:'m'))
        //     ->get();

        
        $quantity= Stock::all();

        //dd($quantity);
        return view('admin.report.report',compact('quantity','reports'));
    }
    
}


