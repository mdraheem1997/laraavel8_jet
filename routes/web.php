<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Route::view('add-employee','add-employee');
// Route::match(['get','post'],'add-employee',[EmployeeController::class,'insert_emp']);

Route::match(['get','post'],'logins',[EmployeeController::class,'login']);

Route::group(['middleware'=>['frontlogin']],function(){ 
	
	Route::match(['get','post'],'add-employee',[EmployeeController::class,'insert_emp']);
	Route::get('dashboards',[EmployeeController::class,'dashboard']);

});

