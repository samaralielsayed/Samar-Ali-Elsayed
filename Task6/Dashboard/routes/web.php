<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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
 Route::get('dashboard',[DashboardController::class,'index'])->middleware('verified')->name('dashboard');
 Route::get('dashboard/products',[ProductController ::class,'index'])->middleware('verified')->name('dashboard.products.index');
 Route::get('dashboard/products/create',[ProductController ::class,'create'])->middleware('verified')->name('dashboard.products.create');
 Route::get('dashboard/products/{id}/edit',[ProductController ::class,'edit'])->middleware('verified')->name('dashboard.products.edit');
 Route::post('dashboard/products/store',[ProductController ::class,'store'])->middleware('verified')->name('dashboard.products.store');
 Route::put('dashboard/products/{id}/update',[ProductController ::class,'update'])->middleware('verified')->name('dashboard.products.update');
 Route::delete('dashboard/products/{id}/destory',[ProductController ::class,'destory'])->middleware('verified')->name('dashboard.products.destory');

Auth::routes(['verify' => true,'register'=>false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
