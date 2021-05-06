<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\UserLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

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

Route::group(["middleware" => 'auth:user'], function(){
    Route::prefix("/user")->group(function(){
        Route::get("/dashboard", [UserController::class, 'index'])->name("user.dashboard");
    });
    
});

Route:: group(["middleware" => 'auth:admin'], function(){
    Route::prefix("/admin")->group(function(){
        Route::get("/dashboard", [AdminController::class, 'index'])->name("admin.dashboard");
    });
});

//For Users
Route::get("/login", [UserLoginController::class, 'index'])->name('login');
Route::post('/login', [UserLoginController::class, 'dologin']);


//For Admins
Route::get("/adminlogin", [AdminLoginController::class, 'index'])->name('adminlogin');;
Route::post("/adminlogin", [AdminLoginController::class, 'dologin']);



Route::get('/', function () {
    return view('layout.main');
});
