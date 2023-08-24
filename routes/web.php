<?php

use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CentrePointController;
use App\Http\Controllers\SpaceController;
use App\Http\Controllers\kategoriController;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/map', [App\Http\Controllers\MapController::class, 'index'])->name('map.index');

// Route::resource('centre-point', (CentrePointController::class));
// Route::resource('space', (SpaceController::class));

// Route::get('/centrepoint/data', [DataController::class, 'centrepoint'])->name('centre-point.data');
// Route::get('/spaces/data', [DataController::class, 'spaces'])->name('data-space');

// Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
// // Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");
// // Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
// // Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");
// // Route::get('/kategori','App\Http\Controllers\KategoriController@index')->name("Kategori.index");
// // Route::get('/kategori', 'App\Http\Controllers\KategoriController@index')->name("Kategori.index");

// // Route::resource('/kategori', kategoriController::class);
Route::resource('centre-point', (CentrePointController::class));
Route::resource('space', (SpaceController::class));

// // Route::get('/space', 'App\Http\Controllers\SpaceController@index')->name("space.index");
Route::get('/centrepoint/data', [DataController::class, 'centrepoint'])->name('centre-point.data');
Route::get('/centrepoint', 'App\Http\Controllers\CentrePointController@index')->name('centrepoint.index');
Route::get('/spaces/data', [DataController::class, 'spaces'])->name('data-space');
// // Route::get('/kategori', 'App\Http\Controllers\KategoriController@create')->name("kategori.create");
// // Route::get('/Kategori', 'App\Http\Controllers\KategoriController@index')->name('Kategori.index');
Route::get('/Kategori', 'App\Http\Controllers\KategoriController@index')->name("kategori.index");
// // Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
// // Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name("cart.delete");
// // Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");

// // Route::middleware('auth')->group(function () {
// //     Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");
// //     Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name("myaccount.orders");
// // });

// Route::middleware('admin')->group(function () {
//     Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
//     Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
//     Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name("admin.product.store");
//     Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name("admin.product.delete");
//     Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name("admin.product.edit");
//     Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name("admin.product.update");
// });

Route::get('/', 'App\Http\Controllers\HomeController@index')->name("home.index");
Route::get('/about', 'App\Http\Controllers\HomeController@about')->name("home.about");
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name("product.index");
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name("product.show");

Route::get('/cart', 'App\Http\Controllers\CartController@index')->name("cart.index");
Route::get('/cart/delete', 'App\Http\Controllers\CartController@delete')->name("cart.delete");
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name("cart.add");

Route::middleware('auth')->group(function () {
    Route::get('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name("cart.purchase");
    Route::get('/my-account/orders', 'App\Http\Controllers\MyAccountController@orders')->name("myaccount.orders");
});

Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name("admin.home.index");
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name("admin.product.index");
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name("admin.product.store");
    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name("admin.product.delete");
    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name("admin.product.edit");
    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name("admin.product.update");
});

Auth::routes();
