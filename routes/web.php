<?php

use App\Http\Controllers\AuthUserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {

    return view('auth.login');

});



Auth::routes();

Route::get('/Vx/Dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Auth::routes();



Route::post('/login',[AuthUserController::class,'Loginsuper'])->name('auth.injira');
Route::post('/Resend/LoginOtp',[AuthUserController::class,'resendOTP'])->name('auth.resendOtp');

Route::post('/validateotp',[AuthUserController::class,'checkotp'])->name('auth.validateotp');

