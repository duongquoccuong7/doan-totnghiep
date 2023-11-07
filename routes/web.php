<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CupponController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\User\UserController;
use Illuminate\Support\Facades\Route;
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
Route::prefix('home')->group(function(){
    Route::get('index',[HomeController::class,'index'])->name('index');
    Route::get('detail/{id}',[HomeController::class,'detailproduct'])->name('detail');
});


#login User
Route::prefix('user')->group(function(){
    Route::prefix('auth')->group(function(){
        Route::get('login',[AuthController::class,'loginindex'])->name('login');
        Route::post('login',[AuthController::class,'login'])->name('postlogin');
        Route::get('register',[AuthController::class,'registerindex'])->name('register');
        Route::post('register',[AuthController::class,'postregister'])->name('postregister');
        Route::get('logout',[AuthController::class,'logout'])->name('logout');
        Route::get('profile',[UserController::class,'profile'])->name('profile');
    });
});

Route::prefix('admin')->group(function () {
    #category
    Route::prefix('category')->group(function () {
        Route::get('add', [CategoryController::class, 'create'])->name('themdanhmuc');
        Route::post('add', [CategoryController::class, 'store'])->name('postthemdanhmuc');
        Route::get('list', [CategoryController::class, 'index'])->name('listdanhmuc');
        Route::get('edit/{id}', [CategoryController::class, 'show'])->name('getdanhmuc');
        Route::post('edit/{id}', [CategoryController::class, 'update'])->name('postdanhmuc');
        Route::get('destroy/{id}', [CategoryController::class, 'destroy'])->name('xoadanhmuc');
    });
    #product
    Route::prefix('product')->group(function () {
        Route::get('add', [ProductController::class, 'create'])->name('themsanpham');
        Route::post('add', [ProductController::class, 'store'])->name('postthemsanpham');
        Route::get('list', [ProductController::class, 'index'])->name('listsanpham');
        Route::get('edit/{id}', [ProductController::class, 'show'])->name('getsanpham');
        Route::post('edit/{id}', [ProductController::class, 'update'])->name('postsanpham');
        Route::get('destroy/{id}', [ProductController::class, 'destroy'])->name('xoasanpham');
    });
    #cuppon
    Route::prefix('cuppon')->group(function () {
        Route::get('add', [CupponController::class, 'create'])->name('themcuppon');
        Route::post('add', [CupponController::class, 'store'])->name('postthemcuppon');
        Route::get('list', [CupponController::class, 'index'])->name('listcuppon');
        Route::get('edit/{id}', [CupponController::class, 'show'])->name('getcuppon');
        Route::post('edit/{id}', [CupponController::class, 'update'])->name('postcuppon');
        Route::get('destroy/{id}', [CupponController::class, 'destroy'])->name('xoacuppon');
    });
});
