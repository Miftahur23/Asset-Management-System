<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FirstpageController;
use App\Http\Controllers\AdminloginpageController;
use App\Http\Controllers\EmploginpageController;
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
    return view('pages.firstpage');
});

Route::get('/admin',[AdminController::class,'Admin']);
Route::get('/employee',[EmployeeController::class,'Employee']);
Route::get('/firstpage',[FirstpageController::class,'Firstpage']);
Route::get('/adminloginpage',[AdminloginpageController::class,'Adminloginpage']);
Route::get('/emploginpage',[emploginpageController::class,'Emploginpage']);