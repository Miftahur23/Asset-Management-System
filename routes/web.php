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



Route::get('/login',[UserController::class,'Login'])->name('loginpage');

Route::post('/loggedin',[UserController::class,'LoggedIn'])->name('loggedin');

Route::get('/loginpage',[UserController::class,'Logout'])->name('logoutpage');

//Route::post('/employeeloggedin',[UserController::class,'UserLoggedIn'])->name('userloggedin');

Route::group(['middleware'=>'auth'],function() {

Route::get('/assetlist', [AdminController::class, 'ShowAsset'])->name('show.asset');
Route::get('/assignedassetlist', [AdminController::class, 'AssignedAsset'])->name('assigned.asset');
Route::get('/assignedassetdetails/{assigned_id}', [AdminController::class, 'ShowAssigned'])->name('show.assigned.details');
Route::get('/assetdetails/{details_id}', [AdminController::class, 'DetailsAsset'])->name('details.asset');

Route::get('/requests', [AdminController::class, 'ShowRequest'])->name('show.reqlist');
Route::get('/damagerequests', [AdminController::class, 'ShowDamageRequest'])->name('show.damagereqlist');
Route::get('/requestform/{req_id}', [AdminController::class, 'CreateRequest'])->name('create.request');
Route::get('/damagerequestform/{dam_id}', [AdminController::class, 'CreateDamageRequest'])->name('create.damagerequest');
Route::post('/storerequest/{req_id}', [AdminController::class, 'StoreRequest'])->name('store.request');
Route::post('/storedamagerequest/{dam_id}', [AdminController::class, 'StoreDamageRequest'])->name('store.damagerequest');
Route::patch('/confirmdistribution/{confirm_id}', [AdminController::class, 'ConfirmDist'])->name('confirm.distribution');

});

Route::group(['prefix'=>'admin','middleware'=>['admin','auth']],function() {

    Route::get('/', function () {
        //return view('master');
        //return view ('pages.empregform');
        return view ('admin.firstpage');
        //return view ('pages.assetform');
    });

    //logout
    Route::get('/home',[HomeController::class,'Homepage'])->name('Homepage');

    //Asset
    
    Route::get('/homepage', [AdminController::class, 'AssetCreated'])->name('AssetCreated');
    Route::post('/created-form', [AdminController::class, 'Assetinfo'])->name('Create.asset');
    Route::get('/deleteasset/{asset_id}', [AdminController::class, 'DeleteAsset'])->name(('delete.asset'));
    Route::get('/editasset/{asset_id}', [AdminController::class, 'EditAsset'])->name(('edit.asset'));
    Route::put('/editedasset/{asset_id}', [AdminController::class, 'EditedAsset'])->name(('edited.asset'));

    
    Route::get('/assetcondition', [AdminController::class, 'ShowAssetCondition'])->name('show.asset.condition');
    
    //Category

    Route::get('/categorylist',[AdminController::class, 'ShowCategory'])->name('show.category');
    Route::get('/categoryform',[AdminController::class, 'CreateCategory'])->name('create.category');
    Route::post('/categoryinserted',[AdminController::class, 'StoreCategory'])->name('store.category');


    Route::get('/editcategory/{category_id}',[AdminController::class, 'EditCategory'])->name('edit.category');
    Route::patch('/updatecategory/{category_id}',[AdminController::class, 'UpdateCategory'])->name('update.category');
    Route::get('/deletecategory/{category_id}',[AdminController::class, 'DeleteCategory'])->name('delete.category');

    //Dashboard

    Route::get('/dashboard',[AdminController::class,'Dashboard'])->name('admin.dashboard');

    //Employee

    Route::get('/employeelist',[AdminController::class, 'ShowEmpinfo'])->name('show.emplist');
    Route::get('/empdetails/{details_id}', [AdminController::class, 'DetailsEmployee'])->name('details.emp');
    Route::get('/empdelete/{delete_id}', [AdminController::class, 'DeleteEmployee'])->name('delete.emp');
    Route::get('/empedit/{edit_id}', [AdminController::class, 'EditEmployee'])->name('edit.emp');
    Route::put('/empupdate/{update_id}', [AdminController::class, 'UpdateEmployee'])->name('update.emp');
    

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
    
    Route::get('/departmentedit/{edit_id}',[AdminController::class, 'EditDepartment'])->name('edit.dept');
    Route::patch('/departmentupdate/{update_id}',[AdminController::class, 'UpdateDepartment'])->name('update.dept');

    Route::get('/departmentdeleted/{dept_id}',[AdminController::class, 'DelDepartment'])->name('delete.dept');

    //Stocks

    Route::get('/activestocks', [AdminController::class, 'ShowActiveStock'])->name('show.active.stock');
    Route::get('/damagestocks', [AdminController::class, 'ShowDamageStock'])->name('show.damage.stock');
    Route::get('/stockform', [AdminController::class, 'CreateStock'])->name('create.stock');
    Route::post('/stocks', [AdminController::class, 'StoreStock'])->name('store.stock');

    //Request 

    
    

    Route::get('/viewrequest/{viewreq_id}', [AdminController::class, 'ViewRequest'])->name('view.request');
    Route::put('/confirmrequest/{req_id}', [AdminController::class, 'Confirmrequest'])->name('confirm.request');
    Route::patch('/updateaction/{action_id}', [AdminController::class, 'UpdateAction'])->name('update.action');

    Route::put('/confirmdam/{dam_id}', [AdminController::class, 'ConfirmDam'])->name('confirm.damrequest');
    Route::patch('/updatedamage/{damage_id}', [AdminController::class, 'UpdateDamage'])->name('update.damage');



    //Distribution 

    Route::get('/distributionlist', [AdminController::class, 'ShowDistribution'])->name('show.distribution');
    Route::get('/selectbranch', [AdminController::class, 'Selectbranch'])->name('select.branch');

    Route::post('/distributionform', [AdminController::class, 'CreateDistribution'])->name('create.distribution');
    Route::post('/storedistribution/{branch_id}/{department_id}', [AdminController::class, 'StoreDistribution'])->name('store.distribution');

    //Puurchase

    Route::get('/purchase', [AdminController::class, 'ShowPurchase'])->name('show.purchase');
    Route::get('/createpurchase', [AdminController::class, 'CreatePurchase'])->name('create.purchase');
    Route::patch('/updatepurchase/{purchase}', [AdminController::class, 'UpdatePurchase'])->name('update.purchase');

    
    //Report

    Route ::get('/report',[AdminController::class, 'ShowReport'])->name('show.report');

});

Route::prefix('employee')->group(function () {

    Route::get('/regform',[EmployeeController::class,'Empregform'])->name('Empreg');
    Route::post('/regdone',[EmployeeController::class,'Empregdone'])->name('Empregdone');
    Route::get('/have-an-account',[EmployeeController::class,'AlreadyHaveAnAccount']);
    
    Route::get('/home', [EmployeeController::class, 'EmpHomepage'])->name('EmpHomepage');
    Route::get('/profile', [EmployeeController::class, 'Profile'])->name('profile');

    
});


Route::get('/',[HomeController::class,'Firstpage'])->name('firstloginpage');

//goja-mil


//Route::get('/employeehome',[HomeController::class,'EmployeeHomepage'])->name('EmployeeHomepage');





Route::get('/adminregister',[UserController::class,'SignUpForm'])->name('usersignup');
Route::post('/registerdone',[UserController::class,'Store'])->name('userregistered');










