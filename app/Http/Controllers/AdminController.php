<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Adminlogininfo;
use App\Models\AssetInfo;
use App\Models\Product;
use App\Models\EmployeeInfo;

class AdminController extends Controller
{
    public function Adminloginpage()
    {
        return view ('pages.adminloginpage');
    }
    public function AssetCreated()
    {
        $emp= EmployeeInfo::all();
        return view ('pages.assetform', compact('emp'));
    }

    public function Adminlogininfo(Request $request)
    {
        //dd($request->all());

        Adminlogininfo::create([
                'email'=>$request->email,
                'password'=>$request->password 
             ]);
        
             return redirect('/home');

    }
    public function ProductForm()
    {
        return view('pages.productsform');
    }

    public function ProductEntry(Request $req){

        Product::create([

            'name'=>$req->productName,
            'price'=>$req->price
        ]);

return redirect('/home');
    }

    public function Assetinfo(Request $request)
    {
        // dd($request->all());

        Assetinfo::create([
                  'asset_name'=>$request->asset_name,
                  'asset_id'=>$request->asset_id,
                  'category'=>$request->category,
                  'quantity'=>$request->quantity, 
                  'cost'=>$request->cost,
                  'purchased_date'=>$request->purchased_date,
                  'description'=>$request->description,
                  'serial_no'=>$request->serial_no,
                  'empid'=>$request->empid, 
               ]);
        
               return redirect('/home');

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
        
        return view ('pages.assetlist', compact('data'));

    }
    public function ShowEmpinfo(){

        //dd($data);
        $data=EmployeeInfo::all();

        return view('pages.emplist', compact ('data'));
    }
    
    
}
