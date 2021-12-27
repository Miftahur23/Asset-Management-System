<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Req;

// use App\Http\Controllers\SignupController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/adminlogin',[UserController::class,'AdminLogin'])->name('adminloginpage');

Route::post('/adminloggedin',[UserController::class,'AdminLoggedIn'])->name('loggedin');
Route::post('/employeeloggedin',[UserController::class,'UserLoggedIn'])->name('userloggedin');




Route::group(['prefix'=>'admin','middleware'=>'auth'],function() {

    Route::get('/', function () {
        //return view('master');
        //return view ('pages.empregform');
        return view ('admin.firstpage');
        //return view ('pages.assetform');
    });

    //logout

    Route::get('/loginpage',[UserController::class,'Logout'])->name('logoutpage');


    //Asset
    
    Route::get('/homepage', [AdminController::class, 'AssetCreated'])->name('AssetCreated');
    Route::post('/created-form', [AdminController::class, 'Assetinfo'])->name('Create.asset');
    Route::get('/assetlist', [AdminController::class, 'ShowAsset'])->name('show.asset');
    Route::get('deleteasset/{asset_id}', [AdminController::class, 'DeleteAsset'])->name(('delete.asset'));

    Route::get('/assetdetails/{details_id}', [AdminController::class, 'DetailsAsset'])->name('details.asset');
    
    Route::get('/assetcondition', [AdminController::class, 'ShowAssetCondition'])->name('show.asset.condition');
    
    //Category

    Route::get('/categorylist',[AdminController::class, 'ShowCategory'])->name('show.category');
    Route::get('/categoryform',[AdminController::class, 'CreateCategory'])->name('create.category');
    Route::post('/categoryinserted',[AdminController::class, 'StoreCategory'])->name('store.category');

    Route::get('/deletecategory/{category_id}',[AdminController::class, 'DeleteCategory'])->name('delete.category');

    //Dashboard

    Route::get('/dashboard',[AdminController::class,'Dashboard'])->name('admin.dashboard');

    //Employee

    Route::get('/employeelist',[AdminController::class, 'ShowEmpinfo'])->name('show.emplist');
    Route::get('/empdetails/{details_id}', [AdminController::class, 'DetailsEmployee'])->name('details.emp');
    Route::get('/empdetails/{details_id}', [AdminController::class, 'DetailsEmployee'])->name('details.emp');
    Route::get('/empdelete/{delete_id}', [AdminController::class, 'DeleteEmployee'])->name('delete.emp');
    
    

    Route::get('/employeelogininfo',[AdminController::class, 'ShowEmploginfo'])->name('show.emplogininfo');

    //Branch 

    Route::get('/branchlist',[AdminController::class, 'ShowBranch'])->name('show.branch');
    Route::get('/branchinsertform',[AdminController::class, 'CreateBranch'])->name('create.branch');
    Route::get('/branchedit/{edit_id}',[AdminController::class, 'EditBranch'])->name('edit.branch');

    Route::patch('/branchedited/{edited_id}',[AdminController::class, 'EditedBranch'])->name('edited.branch');
    
    Route::post('/branchinserted',[AdminController::class, 'StoreBranch'])->name('store.branch');
    Route::get('/branchdeleted/{branch_id}',[AdminController::class, 'DelBranch'])->name('delete.branch');


    // Department

    Route::get('/departmentlist',[AdminController::class, 'ShowDepartment'])->name('show.department');
    Route::get('/departmentform',[AdminController::class, 'CreateDepartment'])->name('create.department');
    Route::post('/departmentinsrted',[AdminController::class, 'StoreDepartment'])->name('store.department');
    Route::get('/departmentdeleted/{dept_id}',[AdminController::class, 'DelDepartment'])->name('delete.dept');

    //Stocks

    Route::get('/activestocks', [AdminController::class, 'ShowActiveStock'])->name('show.active.stock');
    Route::get('/damagestocks', [AdminController::class, 'ShowDamageStock'])->name('show.damage.stock');
    Route::get('/stockform', [AdminController::class, 'ShowStock'])->name('create.stock');
    Route::post('/stocks', [AdminController::class, 'ShowStock'])->name('storestock');

    //Request 

    Route::get('/requests', [AdminController::class, 'ShowRequest'])->name('show.reqlist');
    Route::get('/requestform', [AdminController::class, 'CreateRequest'])->name('create.request');
    Route::post('/storerequest', [AdminController::class, 'StoreRequest'])->name('store.request');
    Route::get('/viewrequest', [AdminController::class, 'ViewRequest'])->name('view.request');
    // Route::put('/confirmrequest/{req_id}', [AdminController::class, 'Confirmrequest'])->name('confirm.request');

    //Distribution 

    Route::get('/distributionlist', [AdminController::class, 'ShowDistribution'])->name('show.distribution');
    Route::get('/distributionform', [AdminController::class, 'CreateDistribution'])->name('create.distribution');
    Route::post('/storedistribution', [AdminController::class, 'StoreDistribution'])->name('store.distribution');

    //Puurchase

    Route::get('/purchase', [AdminController::class, 'ShowPurchase'])->name('show.purchase');

    
    //Report

    Route ::get('/report',[AdminController::class, 'ShowReport'])->name('show.report');

});

Route::prefix('emp')->group(function () {

    Route::get('/regform',[EmployeeController::class,'Empregform'])->name('Empreg');
    Route::post('/regdone',[EmployeeController::class,'Empregdone'])->name('Empregdone');
    Route::get('/have-an-account',[EmployeeController::class,'AlreadyHaveAnAccount']);
    
    Route::get('/empassetlist', [EmployeeController::class, 'EmpShowAsset'])->name('emp.show.asset');
});


Route::get('/firstloginpage',[HomeController::class,'Firstpage'])->name('firstloginpage');

//goja-mil

Route::get('/admin/home',[HomeController::class,'Homepage'])->name('Homepage');
Route::get('/employeehome',[HomeController::class,'EmployeeHomepage'])->name('EmployeeHomepage');





Route::get('/adminregister',[UserController::class,'SignUpForm'])->name('usersignup');
Route::post('/registerdone',[UserController::class,'Store'])->name('userregistered');










