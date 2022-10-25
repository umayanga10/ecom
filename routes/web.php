<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CuponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('admin',[AdminController::class,'index'])->name('admin');

Route::post('admin/auth',[AdminController::class,'auth'])->name('admin.auth');

Route::group(['middleware'=>'admin_auth'],function ()
{
    Route::get('admin/dashboard',[AdminController::class,'dashboard']);

    // Category

    Route::get('admin/category',[CategoryController::class,'index']);
    Route::get('admin/manage_category',[CategoryController::class,'create']);
    Route::post('admin/store',[CategoryController::class,'store'])->name('category_insert');
    Route::get('admin/category/delete/{id}',[CategoryController::class,'delete']);
    Route::get('admin/category/edit/{id}',[CategoryController::class,'edit']);
    Route::post('admin/category/update/{id}',[CategoryController::class,'update']);
    Route::get('admin/category/status/{status}/{id}',[CategoryController::class,'status']);

    // Cupon

    Route::get('admin/cupon',[CuponController::class,'index']);
    Route::get('admin/add_cupon',[CuponController::class,'create']);
    Route::post('admin/cupon_store',[CuponController::class,'store'])->name('cupon.insert');
    Route::get('admin/cupon/delete/{id}',[CuponController::class,'delete']);
    Route::get('admin/cupon/edit/{id}',[CuponController::class,'edit']);
    Route::post('admin/cupon/update/{id}',[CuponController::class,'update']);

    // Size 
    
    Route::get('admin/size',[SizeController::class,'index']);
    Route::get('admin/add_size',[SizeController::class,'create']);
    Route::post('admin/size_store',[SizeController::class,'store'])->name('size.insert');
    Route::get('admin/size/delete/{id}',[SizeController::class,'delete']);
    Route::get('admin/size/edit/{id}',[SizeController::class,'edit']);
    Route::post('admin/size/update/{id}',[SizeController::class,'update']);
    Route::get('admin/size/status/{status}/{id}',[SizeController::class,'status']);

     // Product 
    
     Route::get('admin/product',[ProductController::class,'index'])->name('product');
     Route::post('admin/add_product',[ProductController::class,'store']);
     Route::get('admin/view',[ProductController::class,'view']);
     Route::post('admin/search',[ProductController::class, 'load_table']);
     Route::get('admin/export',[ProductController::class, 'export']);

    // Log out
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error','Logout successfully');
        return redirect('admin');
    });
});





