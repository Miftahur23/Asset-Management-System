<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmploginpageController;
use App\Http\Controllers\EmpregformController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
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

Route::get('/', function () {
    //return view('master');
    //return view ('pages.empregform');
    return view ('admin.firstpage');
    //return view ('pages.assetform');
});
Route::prefix('admin')->group(function () {

    //Asset
    
    Route::get('/homepage', [AdminController::class, 'AssetCreated'])->name('AssetCreated');
    Route::post('/created-form', [AdminController::class, 'Assetinfo'])->name('Create.asset');
    Route::get('/assetlist', [AdminController::class, 'ShowAsset'])->name('show.asset');
    Route::get('deleteasset/{asset_id}', [AdminController::class, 'DeleteAsset'])->name(('delete.asset'));
    Route::get('/empassetlist', [AdminController::class, 'EmpShowAsset'])->name('emp.show.asset');

    Route::get('/assetdetails/{details_id}', [AdminController::class, 'DetailsAsset'])->name('details.asset');
    
    Route::get('/assetcondition', [AdminController::class, 'ShowAssetCondition'])->name('show.asset.condition');
    
    //Category

    Route::get('/categorylist',[AdminController::class, 'ShowCategory'])->name('show.category');
    Route::get('/categoryform',[AdminController::class, 'CreateCategory'])->name('create.category');
    Route::post('/categoryinserted',[AdminController::class, 'StoreCategory'])->name('store.category');

    Route::get('/deletecategory/{category_id}',[AdminController::class, 'DeleteCategory'])->name('delete.category');



    // Route::get('/produclist', [AdminController::class, 'ProductForm'])->name('show.productform');
    // Route::post('/entrydone', [AdminController::class, 'ProductEntry'])->name('product.entry');
    
    //Employee

    Route::get('/employeelist',[AdminController::class, 'ShowEmpinfo'])->name('show.emplist');
    Route::get('/empdetails/{details_id}', [AdminController::class, 'DetailsEmployee'])->name('details.emp');
    Route::get('/employeelogininfo',[AdminController::class, 'ShowEmploginfo'])->name('show.emplogininfo');

    //Branch 

    Route::get('/branchlist',[AdminController::class, 'ShowBranch'])->name('show.branch');
    Route::get('/branchinsertform',[AdminController::class, 'CreateBranch'])->name('create.branch');
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

    //Distribution 

    Route::get('/distribution', [AdminController::class, 'ShowDistribution'])->name('show.distribution');

    //Puurchase

    Route::get('/purchase', [AdminController::class, 'ShowPurchase'])->name('show.purchase');

    
    //Report

    Route ::get('/report',[AdminController::class, 'ShowReport'])->name('show.report');

});

Route::prefix('emp')->group(function () {

    Route::get('/loginpage',[EmploginpageController::class,'Emploginpage'])->name('Emplogin');
    Route::post('/loginpage',[EmploginpageController::class,'Emplogininfo'])->name('Emplogindone');
    Route::get('/regform',[EmpregformController::class,'Empregform'])->name('Empreg');
    Route::post('/regdone',[EmpregformController::class,'Empregdone'])->name('Empregdone');
    Route::get('/have-an-account',[EmpregformController::class,'AlreadyHaveAnAccount']);
});


Route::get('/firstloginpage',[HomeController::class,'Firstpage'])->name('firstloginpage');

Route::get('/home',[HomeController::class,'Homepage'])->name('Homepage');
Route::get('/employeehome',[HomeController::class,'EmployeeHomepage'])->name('EmployeeHomepage');

Route::get('/dashboard',[AdminController::class,'Dashboard']);



Route::get('/adminregister',[UserController::class,'SignUpForm'])->name('usersignup');
Route::post('/registerdone',[UserController::class,'Store'])->name('userregistered');


Route::get('/loginpage',[UserController::class,'Logout'])->name('logoutpage');
Route::get('/userlogin',[UserController::class,'UserLogin'])->name('userloginpage');
Route::get('/adminlogin',[UserController::class,'AdminLogin'])->name('adminloginpage');
Route::post('/userloggedin',[UserController::class,'LoggedIn'])->name('loggedin');
Route::post('/employeeloggedin',[UserController::class,'UserLoggedIn'])->name('userloggedin');










