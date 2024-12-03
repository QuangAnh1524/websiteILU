<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CouponController;
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

use App\Http\Controllers\Client\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('client.home.index');


Route::get('/adminDashboard', function () {
    return view('admin.adminDashboard');
})->name('adminDashboard');


Route::resource('/products', \App\Http\Controllers\Admin\Product::class);

Route::get('/products/{id}', [\App\Http\Controllers\Admin\Product::class, 'show'])->name('admin.products.show');
Route::get('/products/{id}/edit', [\App\Http\Controllers\Admin\Product::class, 'edit'])->name('admin.products.edit');

Route::get('/products/{id}/confirmDelete', [\App\Http\Controllers\Admin\Product::class, 'confirmDestroy'])
    ->name('admin.products.confirmDestroy');

Route::get('products/categories/{id}', [\App\Http\Controllers\Admin\Product::class, 'show'])->name('admin.categories.show');
Route::resource('categories', CategoryController::class);

Route::get('/categories/{id}/confirmDelete', [CategoryController::class, 'confirmDestroy'])
    ->name('categories.confirmDestroy');

Route::get('product/{categoryID}', [\App\Http\Controllers\Client\ProductController::class, 'index'])
    ->name('client.product.index');
Route::get('/product-details/{id}', [\App\Http\Controllers\Client\ProductController::class, 'show'])
    ->name('client.product.show');

Route::resource('coupons', CouponController::class);

//Auth::routes();

Route::get('/home', [\App\Http\Controllers\Client\HomeController::class, 'index'])->name('home');
