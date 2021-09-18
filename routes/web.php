<?php

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/single/{article}', [\App\Http\Controllers\ArticleController::class, 'show'])->name('single');
Route::get('/category/{category}', [\App\Http\Controllers\CategoryController::class, 'show'])->name('category');

Auth::routes();

Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');


////////////////////داشبورد/////////////////


Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');
    Route::resource('/category', \App\Http\Controllers\CategoryController::class);
    Route::resource('/article', \App\Http\Controllers\ArticleController::class);

});
