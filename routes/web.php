<?php

use App\Http\Controllers\User\UserController;
Use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\Frontend\IndexController;
Use App\Http\Controllers\Admin\BrandController;
Use App\Http\Controllers\Admin\CategoryController;
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

Route::get('/',[IndexController::class,'index'] );

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin route
Route::group(['prefix'=>'admin','middleware' =>['admin','auth'],'namespace'=>'Admin'], function(){
    Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');


    //brands
    Route::get('all-brand',[BrandController::class,'index'])->name('brand');
    Route::post('brand/store',[BrandController::class,'brandStore'])->name('brand-store');
    Route::get('brand-edit/{brand_id}',[BrandController::class,'edit']);
    Route::post('brand/update',[BrandController::class,'brandUpdate'])->name('update-brand');
    Route::get('/brand-delete/{brand_id}',[BrandController::class,'delete']);



    //category
    Route::get('category',[CategoryController::class,'index'])->name('category');
    Route::post('category/store',[CategoryController::class,'categoryStore'])->name('category-store');
    Route::get('/category-edit/{cat_id}',[CategoryController::class,'edit']);
    Route::post('category/update',[CategoryController::class,'catUpdate'])->name('update-category');
    Route::get('/category-delete/{cat_id}',[CategoryController::class,'delete']);

    //category


    //subcategory
    Route::get('sub-category',[CategoryController::class,'subIndex'])->name('sub-category');
    Route::post('sub-category/store',[CategoryController::class,'subCategoryStore'])->name('subcategory-store');
    Route::get('sub-category-edit/{subcat_id}',[CategoryController::class,'subEdit']);
    Route::post('sub-category/update',[CategoryController::class,'subCatUpdate'])->name('update-sub-category');
    Route::get('sub-category-delete/{subcat_id}',[CategoryController::class,'subDelete']);
});

//admin route

//user route
Route::group(['prefix'=>'user','middleware' =>['user','auth'],'namespace'=>'User'], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::post('update/data',[UserController::class,'updateData'])->name('update-profile');
    Route::get('image',[UserController::class,'imagePage'])->name('user-image');
    Route::post('update/image',[UserController::class,'updateImage'])->name('update-image');
    Route::get('update/password',[UserController::class,'updatePassPage'])->name('update-password');
    Route::post('store/password',[UserController::class,'storePassword'])->name('store-password');

});

//user route