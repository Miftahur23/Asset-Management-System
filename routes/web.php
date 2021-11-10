<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FirstpageController;
use App\Http\Controllers\LoginpageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SignupController;

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
    return view('master');
});

Route::get('/admin',[AdminController::class,'Admin']);
Route::get('/loginpage',[LoginpageController::class,'Loginpage'])->name('Login');
//Route::get('/loginpage',[LoginpageController::class,'Loginpage']);
Route::get('/home',[HomeController::class,'Homepage']);
Route::get('/dashboard',[DashboardController::class,'Dashboard']);
Route::get('/signupform',[SignupController::class,'Signup'])->name('Signup');
Route::get('/loginpage',[SignupController::class,'AlreadyHaveAnAccount']);
