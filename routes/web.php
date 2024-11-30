<?php

use App\Http\Controllers\Admin\CategoryController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/adminDashboard', function () {
    return view('admin.adminDashboard');
})->name('adminDashboard');

Route::get('/websiteClient', function () {
    return view('client.layouts.app');
});

Route::resource('/products', \App\Http\Controllers\Admin\Product::class);

Route::get('/products/{id}', [\App\Http\Controllers\Admin\Product::class, 'show'])->name('admin.products.show');
Route::get('/products/{id}/edit', [\App\Http\Controllers\Admin\Product::class, 'edit'])->name('admin.products.edit');

Route::get('/products/{id}/confirmDelete', [\App\Http\Controllers\Admin\Product::class, 'confirmDestroy'])
    ->name('admin.products.confirmDestroy');

Route::get('products/categories/{id}', [\App\Http\Controllers\Admin\Product::class, 'show'])->name('admin.categories.show');
Route::resource('categories', CategoryController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
