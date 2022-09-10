<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [App\Http\Controllers\ShopController::class, 'index'])->name('shop.index');

Auth::routes();

Route::middleware(['web'])->prefix('admin')->name('admin.')->group(function () {
    // php artisan route:list --name=user
    Route::resource('users', App\Http\Controllers\Admin\UserController::class);
});

// Me gusta mas esta forma
Route::group(['middleware' => 'web', 'prefix' => 'admin', 'as' => 'admin.'], function (){
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('categories', App\Http\Controllers\Admin\CategoryController::class);
});


