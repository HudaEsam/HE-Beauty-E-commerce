<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::controller(ApiProductController::class)->group(function(){
    Route::middleware('api_auth')->group(function(){
        Route::get('products',"all");
        Route::get('products/{id}',"show");
        Route::post('products',"store");
        Route::put('products/{id}',"update");
        Route::delete('products/{id}',"delete");
    });
    

    });
Route::controller(ApiAuthController::class)->group(function(){
        Route::post('register',"register");
        Route::post('login',"login");
        Route::post('logout',"logout")->middleware('api_auth');
    });
Route::post('/register', 'App\Http\Controllers\User2Controller@register');
Route::post('/login', 'App\Http\Controllers\LoginController@login');
Route::get('/user', 'App\Http\Controllers\User2Controller@getUserDetails')->middleware('auth:sanctum');