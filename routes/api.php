<?php

use App\Models\User;
use App\Models\UserLiveLocation;
use App\Http\Controllers\AuthUserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UmufungoController;
use App\Http\Controllers\UserLiveLocationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Public Routes
Route::get('/Errandz/showAllUser',[AuthUserController::class,'viewallusers']);
Route::post('/Errandz/Register',[AuthUserController::class,'store']);
Route::post('/Errandz/Login',[AuthUserController::class,'signinuser']);

//Fetch All Task
Route::get('/Errandz/Vx/Admin/View-All-Tasks',[TaskController::class,'fetchalltasks']);

//view categories
Route::get('/Errandz/Vx/Admin/show-Task-Category',[TaskController::class,'viewtasks_category']);

//Task/Errandz
Route::post('/Errandz/Vx/Admin/PostErrand',[TaskController::class,'createTasks']);

//requestjoboffer
Route::post('/Errandz/Vx/Request/User/Offers',[TaskController::class,'apply_request']);


//retrieve all  myactive errandz
Route::post('/Errandz/Vx/View/Task/Me/Active-Errandz',[TaskController::class,'viewactive_offer']);

//retrieve all  my errandz
Route::post('/Errandz/Vx/View/Task/Me/All-Errandz',[TaskController::class,'viewall_offer']);

Route::put('/Errandz/Modify/{id}',[AuthUserController::class,'update']);

//ikofi depo
Route::post('/Wallet/xV/User/Errandz-Ikofi/Deposit',[UmufungoController::class,'kubika_uMufunGoo']);

//mywalletbal
Route::post('/Wallet/xV/Me/Errandz-Ikofi/Balance',[UmufungoController::class,'Ikofi_yanjYE']);


//Protected Routes
Route::group(['middleware' => ['auth:sanctum']],function(){
    
    Route::put('/Errandz/View/{id}',[AuthUserController::class,'showuser']);
    Route::put('/Errandz/Delete/{id}',[AuthUserController::class,'destroy']);
    Route::post('/Errandz/Logout',[AuthUserController::class,'signout']);  

    Route::post('/Errandz/ShowUserLiveLocation',[UserLiveLocationController::class,'store']);
  
//User roles     
Route::post('/Errandz/Vx/Admin/Register-Role',[AuthUserController::class,'addRole']);
Route::get('/Errandz/Vx/Admin/show-All-Roles',[AuthUserController::class,'viewRoles']);


//task category
Route::post('/Errandz/Vx/Admin/Register-Task-Category',[TaskController::class,'addTaskcategory']);

//Task stastus
Route::post('/Errandz/Vx/Admin/Add-Task-status',[TaskController::class,'addTaskstatus']);


//online use
Route::post('/Errandz/send/onlineuserstatus',[TaskController::class,'saveonlinestatus']);


});

