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

Route::get('/', function () {
    return view('welcome');
})->name('/');

Auth::routes();

Route::middleware(['web'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('user', App\Http\Controllers\Admin\UserController::class);
});

// Me gusta mas esta forma
Route::group(['middleware' => 'web', 'prefix' => 'admin', 'as' => 'admin.'], function (){
    Route::resource('product', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('category', App\Http\Controllers\Admin\CategoryController::class);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
