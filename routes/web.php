<?php

use Illuminate\Support\Facades\Route;

//--------------Admin panel--------------

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubcatController;
use App\Http\Controllers\ordertwoController;
use App\Http\Controllers\BrandsController;
use App\Http\Controllers\ManageproController;
use App\Http\Controllers\homesliderController;
use App\Http\Controllers\BulkController;
use App\Http\Controllers\NewofferController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\customerController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ShipchargeController;
use App\Http\Controllers\AddproController;
use App\Http\Controllers\bulvarController;

// ----------------Admin Panel-----------------------

Route::get('dashboard',[DashboardController::class,'index'])->name('dashboard')->middleware('auth');
Route::get('login',[AdminLoginController::class,'adminlogin'])->name('login');
Route::post('adminlogin',[AdminLoginController::class,'logincheck'])->name('adminlogin');
Route::get('logout',[AdminLoginController::class,'logout'])->name('logout');
Route::get('change-password', [AdminLoginController::class, 'changePassword'])->name('change.password.form');
Route::post('change-password', [AdminLoginController::class, 'changPasswordStore'])->name('change.password');
Route::resource('cat',CategorieController::class)->middleware('auth');//PRODUCT blade file
Route::resource('order',OrderController::class)->middleware('auth');
Route::resource('product',ProductController::class)->middleware('auth'); //categories bladefile
Route::resource('childcategory',SubcatController::class)->middleware('auth');
Route::resource('buyitem',ordertwoController::class)->middleware('auth');
Route::resource('brandss',BrandsController::class)->middleware('auth');
Route::resource('manage',ManageproController::class)->middleware('auth');
Route::resource('hom',homesliderController::class)->middleware('auth');
Route::resource('bulk',BulkController::class)->middleware('auth');
Route::resource('news',NewofferController::class)->middleware('auth');
Route::resource('prom',PromoController::class)->middleware('auth');
Route::resource('custom',customerController::class)->middleware('auth');
Route::resource('fees',FeatureController::class)->middleware('auth');
Route::resource('ships',ShipchargeController::class)->middleware('auth');
Route::resource('bulkvar',bulvarController::class)->middleware('auth');
Route::resource('addpro',AddproController::class)->middleware('auth');
// Route::get('/status/update', [homesliderController::class, 'updateStatus']);