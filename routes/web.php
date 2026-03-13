<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


/*
|--------------------------------------------------------------------------
| Employee Register/Login
|--------------------------------------------------------------------------
*/

Route::get('/employee/register',[AuthController::class,'employeeRegister']);
Route::post('/employee/register',[AuthController::class,'employeeStore']);

Route::get('/employee/login',[AuthController::class,'employeeLogin']);
Route::post('/employee/login',[AuthController::class,'employeeLoginCheck']);


/*
|--------------------------------------------------------------------------
| Employer Register/Login
|--------------------------------------------------------------------------
*/

Route::get('/employer/register',[AuthController::class,'employerRegister']);
Route::post('/employer/register',[AuthController::class,'employerStore']);

Route::get('/employer/login',[AuthController::class,'employerLogin']);
Route::post('/employer/login',[AuthController::class,'employerLoginCheck']);


/*
|--------------------------------------------------------------------------
| Admin Login
|--------------------------------------------------------------------------
*/

Route::get('/admin/login',[AuthController::class,'adminLogin']);
Route::post('/admin/login',[AuthController::class,'adminLoginCheck']);


/*
|--------------------------------------------------------------------------
| Dashboards
|--------------------------------------------------------------------------
*/

Route::middleware(['auth','role:admin'])->prefix('admin')->group(function () {

Route::get('/dashboard', function () {
return view('admin.dashboard');
})->name('admin.dashboard');

});


Route::middleware(['auth','role:employer'])->prefix('employer')->group(function () {

Route::get('/dashboard', function () {
return view('employer.dashboard');
})->name('employer.dashboard');

});


Route::middleware(['auth','role:employee'])->prefix('employee')->group(function () {

Route::get('/dashboard', function () {
return view('employee.dashboard');
})->name('employee.dashboard');

});