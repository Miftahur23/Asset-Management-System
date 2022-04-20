<?php

namespace App\Http\Controllers;

use DataTables;
use Carbon\Carbon;
use App\Models\Req;
use App\Models\User;
use App\Models\Stock;
use App\Models\Branch;
use App\Models\Report;
use App\Models\Product;
use App\Models\AssetInfo;
use App\Models\DamageReq;
use App\Models\Department;
use App\Models\Distribution;
use App\Models\EmployeeInfo;
use Illuminate\Http\Request;
use App\Models\Adminlogininfo;
use App\Events\DepartmentEvent;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AssetRequest;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AssetRepository;
use Illuminate\Support\Facades\Cache;


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

        $stocks=Stock::all();
        $totalworth=0;
        foreach($stocks as $item)
        {
            $totalworth+=$item->worth;
        }

       $totalworth=intval($totalworth);

        //dd($count);
        return view ('admin.dashboard',compact('count','totalworth'));
    }


    
    public function ShowBranch()
    {
        $key=null;
        if(request()->search){
            $key=request()->search;
            $branches = Branch::where('name','LIKE','%'.$key.'%')->get();
            return view('admin.branch.branchlist', compact('branches','key'));
        }
        $branches=Branch::paginate(300);
        return view ('admin.branch.branchlist', compact ('branches','key'));
    }

    public function getBranch(Request $request)
    {
        if ($request->ajax()) {
            $data = Branch::latest()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> 
                                <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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

        if(Cache::has('Departments'))
        {
            $departments=Cache::get('Departments');
            $msg='Cache';
        }else
        {
            $departments=Department::all();
            Cache::put('Departments',$departments);
            $msg='Database';
        }
        return view ('admin.department.departmentlist', compact('departments','msg','key'));
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

        $deptCreate=Department::create([
            'dname'=>$req->dname
        ]);

        event(new DepartmentEvent($deptCreate));
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

        // $user=User::findOrFail($user_id);
        // $user->delete();
        // event(new UserEvent($user));
        // return redirect()->back();

        $department=Department::findOrFail($deldept);
        $department->delete();

        event(new DepartmentEvent($department));
        Toastr::success('Deleted');
        return redirect()->back();
    }

    

    public function ShowRequest()
    {
        $key=null;
        if(request()->search){
            $key=request()->search;
            $data = Req::where('requested_by','LIKE','%'.$key.'%')
            ->orWhere('asset_name','LIKE','%'.$key.'%')
            ->paginate(5);
            return view('admin.request.reqlist', compact('data','key'));
        }
        
        
        if(Auth::User()->role=='admin')
        {
            $data= Req::paginate(5);

        }
        else
        {
            $data= Req::where('requested_by',Auth::User()->name)->paginate(5);
        }
        return view('admin.request.reqlist', compact ('data','key'));
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

    public function ConfirmDist($confirm)
    {
        $updateaction=Distribution::find($confirm);

        //dd($updateaction->status);
        //dd(request()->all());
        $updateaction->update([
            'status'=>request()->status
        ]);

        return redirect()->back();
    }

    public function CreateDamageRequest ($dam_id)
    {
       
        $damage=Distribution::find($dam_id);
        //  dd($damage);
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
             'reason'=>$request->reason
          ]);
 
          return redirect()->back()->with('damage', 'Successfully Requested');
    }
    public function ShowDamageRequest()
    {

        if(Auth::User()->role=='admin')
        {
            $damage= DamageReq::paginate(5);

        }
        else
        {
            $damage= DamageReq::where('requested_by',Auth::User()->name)->paginate(5);
        }
        return view('admin.request.damreqlist', compact ('damage'));
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
        $departments=Department::all();
        return view('admin.distribution.selectbranch', compact ('branches','departments'));

    }

    

    public function CreateDistribution(Request $request)
    {
        $employee=EmployeeInfo::where('branches_id',$request->branches_id)->where('departments_id',$request->departments_id)->get();
        $branch_id=$request->branches_id;
        $department_id=$request->departments_id;
        $stocks=Stock::all();

        

        //dd($departments);
        return view('admin.distribution.distform', compact ('stocks','department_id','employee','branch_id'));
    }
        

    public function StoreDistribution(Request $request,$branches_id,$departments_id)
    {
        //dd($branches_id,$departments_id);

        $request->validate([
            'stock_id'=>'required',
            'quantity'=>'required',
        ]);

        // dd($request->all());
        $quantity=0;
        
        $stock=Stock::where('asset_id',$request->stock_id)->first();

        //dd($stock->asset_id);
        
        $quantity=$stock->quantity - $request->quantity;

        //dd($quantity);

        if($stock->quantity >= $request->quantity)
        
        {
            if(Distribution::where('employee_id',$request->employee_id)->where('asset_id',$stock->asset_id)->exists())
            {
                $variable=Distribution::where('employee_id',$request->employee_id)->where('asset_id',$stock->asset_id)->first();
                //dd($variable->quantity+$request->quantity);
                $variable->update([
                    'quantity'=>$variable->quantity+$request->quantity
                ]);

                $stock->update([
                    'quantity'=>$quantity
                ]);
                return redirect()->route('show.distribution')->with('success', 'Asset Distributed Successfully');

            }


            //dd($request->all());
            Distribution::create([
                'employee_id'=>$request->employee_id,
                'stock_id'=>$request->stock_id,
                'asset_id'=>$stock->asset_id,
                'quantity'=>$request->quantity,
                'departments_id'=>$departments_id,
                'branches_id'=>$branches_id,
             ]);

            

             $stock->update([
                'quantity'=>$quantity
            ]);
             return redirect()->route('show.distribution')->with('success', 'Asset Distributed Successfully');
            
        }

        else
        {
            return redirect()->route('show.distribution')->with('stock','Not enough stock');
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
        $variable=Stock::where('asset_id',$request->asset_id)->first();

        if(Stock::where('asset_id',$request->asset_id)->exists()){
            $variable->update([
                'quantity'=>$request->quantity+$variable->quantity
            ]);

            return redirect()->route('show.active.stock')->with('success', 'Stock Created Successfully');

        }

        else
        
        {
        Stock::create([
                'asset_id'=>$request->asset_id,
                'quantity'=>$request->quantity,
                'location'=>$request->location,
                'worth'=>$request->quantity*$price->cost,
             ]);

             return redirect()->route('show.active.stock')->with('success', 'Stock Created Successfully');

        }

        
            
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

    
    public function ShowAsset(){
        
        //dd($data);

        $key=null;
        if(request()->search){
            $key=request()->search;
            $assets = AssetInfo::where('asset_name','LIKE','%'.$key.'%')
                ->orWhere('category','LIKE','%'.$key.'%')
                ->paginate(3);
            return view('admin.asset.assetlist',compact('assets','key'));
        }
        $assets = Assetinfo::paginate(3);
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

    public function ShowAssigned($assigned_id)
    {
        $assigned=Distribution::find($assigned_id);
        return view ('admin.asset.assigneddetails',compact('assigned'));
    }

    public function Assetinfo(AssetRequest $request, AssetRepository $asset)
    {
        $asset->store($request);
        return redirect()->route('show.asset');
    }

    public function DetailsAsset($details_id, AssetRepository $findasset)
    {
        $asset=$findasset->find($details_id);
        return view ('admin.asset.assetdetails',compact('asset'));
    }

    public function EditAsset($id, AssetRepository $findasset)
    {
        $edit=$findasset->find($id);
        return view('admin.asset.edit', compact('edit'));
    }

    public function EditedAsset($id, AssetRequest $requesttt, AssetRepository $findasset)
    {
        $updatedAsset=$findasset->find($id);
        $findasset->update($updatedAsset, $requesttt);
        return redirect()->route('show.asset')->with('success', 'Asset Edited Successfully');
    }

    public function DeleteAsset($delasset)
    {
        AssetInfo::find($delasset)->delete();

        return redirect()->back()->with('delete', 'Asset deleted');
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
            
            $reports=Distribution::where('quantity','>=',1)->whereBetween('created_at',[$from_date,$to_date])->get();

        
        }

        

        $dist = Distribution::where('created_at','>=', Carbon::now()->subDays(7))
        ->get();

        
        
        // $reports=Stock::where('worth','>=',30000)
        // ->whereDate('created_at','>=',$from_date)
        // ->whereDate('created_at','<=',$to_date)
        // ->get();

        // $reports= AssetInfo::whereBetween('created_at', [Carbon::now()->startOfMonth(), Carbon::now()->endOfMonth()])
        //     ->get();

        // $reports= AssetInfo::whereMonth('created_at', date(format:'m'))
        //     ->get();

        
        // $quantity= Stock::all();

        //dd($quantity);
        return view('admin.report.report',compact('reports','dist'));
    }
    
}


