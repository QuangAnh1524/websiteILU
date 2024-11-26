<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
