<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmploginpageController;
use App\Http\Controllers\EmpregformController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
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
    return view ('pages.firstpage');
    //return view ('pages.assetform');
});
Route::prefix('admin')->group(function () {

    Route::get('/loginpage',[AdminController::class, 'Adminloginpage'])->name('Adminlogin');
    Route::post('/logindone',[AdminController::class, 'Adminlogininfo'])->name('Adminlogindone');

    Route::get('/homepage', [AdminController::class, 'AssetCreated'])->name('AssetCreated');
    Route::post('/created-form', [AdminController::class, 'Assetinfo'])->name('Create.asset');
    Route::get('/assetlist', [AdminController::class, 'ShowAsset'])->name('show.asset');
    
    Route::get('/assetcondition', [AdminController::class, 'ShowAssetCondition'])->name('show.asset.condition');
    

    // Route::get('/produclist', [AdminController::class, 'ProductForm'])->name('show.productform');
    // Route::post('/entrydone', [AdminController::class, 'ProductEntry'])->name('product.entry');
    
    Route::get('/employeelist',[AdminController::class, 'ShowEmpinfo'])->name('show.emplist');
    Route::get('/employeelogininfo',[AdminController::class, 'ShowEmploginfo'])->name('show.emplogininfo');

    Route::get('/branchlist',[AdminController::class, 'ShowBranch'])->name('show.branch');
    Route::get('/branchinsertform',[AdminController::class, 'CreateBranch'])->name('create.branch');
    Route::post('/branchinserted',[AdminController::class, 'StoreBranch'])->name('store.branch');

    Route::get('/departmentlist',[AdminController::class, 'ShowDepartment'])->name('show.department');
    Route::get('/departmentform',[AdminController::class, 'CreateDepartment'])->name('create.department');
    Route::post('/departmentinsrted',[AdminController::class, 'StoreDepartment'])->name('store.department');

    Route::get('/stocks', [AdminController::class, 'ShowStock'])->name('show.stock');
    Route::get('/stockform', [AdminController::class, 'ShowStock'])->name('create.stock');
    Route::post('/stocks', [AdminController::class, 'ShowStock'])->name('storestock');

    Route::get('/requests', [AdminController::class, 'ShowRequest'])->name('show.request');


});

Route::prefix('emp')->group(function () {

    Route::get('/loginpage',[EmploginpageController::class,'Emploginpage'])->name('Emplogin');
    Route::post('/loginpage',[EmploginpageController::class,'Emplogininfo'])->name('Emplogindone');
    Route::get('/regform',[EmpregformController::class,'Empregform'])->name('Empreg');
    Route::post('/regdone',[EmpregformController::class,'Empregdone'])->name('Empregdone');
    Route::get('/have-an-account',[EmpregformController::class,'AlreadyHaveAnAccount']);
});


Route::get('/home',[HomeController::class,'Homepage'])->name('Homepage');
Route::get('/firstpage',[HomeController::class,'Firstpage'])->name('Firstpage');
Route::get('/dashboard',[DashboardController::class,'Dashboard']);


// Route::get('/signupform',[SignupController::class,'Signup'])->name('Signup');

// Route::post('/account/store', [HomeController::class,'AccountStore'])->name('ektanam');