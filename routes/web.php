<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Employee\EmployeeAuthController;

Route::get('/', function () {
    return view('home');
});

Route::prefix('employee')->group(function(){

    // Auth
    Route::get('/register',[EmployeeAuthController::class,'showRegister']);
    Route::post('/register',[EmployeeAuthController::class,'register']);

    Route::get('/login',[EmployeeAuthController::class,'showLogin']);
    Route::post('/login',[EmployeeAuthController::class,'login']);

    // Protected Routes
    Route::middleware('employee')->group(function(){

        Route::get('/dashboard',[EmployeeAuthController::class,'dashboard']);
        Route::get('/logout',[EmployeeAuthController::class,'logout']);

        Route::get('/profile',[EmployeeAuthController::class,'profile']);
        Route::post('/profile',[EmployeeAuthController::class,'updateProfile']);

    });

});