<?php
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard'); })->name('dashboard');
});

Route::get("redirect",[HomeController::class,"redirect"]);
Route::controller(CategoryController::class)->group(function(){
    Route::middleware(IsAdmin::class)->group(function(){
        Route::get('categories/all',"all");
        Route::get('categories/showCategory/{id}',"show");
        Route::get('categories/create',"create");
        Route::post('categories',"insert")->name("insert");
        //edit and updatda
        Route::get('category/editCategory/{id}',"edit");
        Route::put('category/{id}',"updata");
        //delete
        Route::delete('category/deleteCategory/{id}',"delete");
    });
   


});
Route::controller(ProductController::class)->group(function(){
    Route::middleware(IsAdmin::class)->group(function(){
    //all
    Route::get('products/all',"all");
    Route::get('products/show/{id}',"show");
    //create
    Route::get('products/create',"create");
    Route::post('products',"store")->name("store");
    //edit and updatda
    Route::get('product/edit/{id}',"edit");
    Route::put('product/{id}',"updata");
    //delete
    Route::delete('product/delete/{id}',"delete");
});
});
Route::get("change/{lang}",function($lang){
    if($lang=="ar"){
        session()->put("lang","ar");
    }
    else{
        session()->put("lang","en");
    }
    return redirect()->back();

});
Route::controller(UserController::class)->group(function(){

    Route::get('',"home");
    Route::get('User.shop',"shop");
    Route::get('User.oneProduct/{id}',"oneProduct");
    Route::get('search',"search");
    Route::get('User.myCart',"myCart");
    Route::post('User.myCart/{id}',"addToCart");
    Route::post('makeOrder',"makeOrder");
    // Route::get('User.shop',"allCategories");
    Route::get('User.showCategory/{category}','showCategory')->name('show.category');

    Route::get('User.favProducts',"favProducts");
    
});
