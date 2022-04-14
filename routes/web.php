<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Productcontroller;

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

Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', function () {
    Session::forget('user');
    return redirect('login');
});
Route::view("/register",'register');
Route::post('/register',[Usercontroller::class,'register']);
Route::post('/login',[Usercontroller::class,'login']);

Route::get('/',[Productcontroller::class,'index']);
Route::get('/detail/{id}',[Productcontroller::class,'detail']);

Route::post("/add_to_cart",[ProductController::class,'addtocart']); 
Route::get("/cartdetails",[ProductController::class,'cartdetails']); 
Route::get("/removecart/{id}",[ProductController::class,'removCart']);
Route::get("/ordernow",[ProductController::class,'ordernow']);
Route::post("/orderplace",[ProductController::class,'orderPlace']);
Route::get("/myorders",[ProductController::class,'myorder']);


