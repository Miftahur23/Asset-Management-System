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
    //  return view ('pages.firstpage');
    return view ('pages.assetform');
});

Route::get('/adminloginpage',[AdminController::class,'Adminloginpage'])->name('Adminlogin');
Route::get('/homepage', [AdminController::class, 'AssetCreated'])->name('AssetCreated');
Route::get('/emploginpage',[EmploginpageController::class,'Emploginpage'])->name('Emplogin');
Route::get('/empregform',[EmpregformController::class,'Empregform'])->name('Empreg');
Route::get('/home',[HomeController::class,'Homepage'])->name('Homepage');
Route::get('/firstpage',[HomeController::class,'Firstpage'])->name('Firstpage');
Route::get('/dashboard',[DashboardController::class,'Dashboard']);
// Route::get('/signupform',[SignupController::class,'Signup'])->name('Signup');
Route::get('/have-an-account',[EmpregformController::class,'AlreadyHaveAnAccount']);
Route::post('/account/store', [HomeController::class,'AccountStore'])->name('ektanam');