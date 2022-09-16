<?php

use Illuminate\Http\Request;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

// Otra forma de afrontar la cosa y evitar urls largas podria ser:
// Route::get('/c/{category?}/s/{subcategory?}', function(Category $category, ...) { ...
Route::get('/c/{category}/s/{subcategory}/p/{product}',
            [App\Http\Controllers\Front\ProductController::class, 'index'])->where([
                'categorySlug' => '[a-z]+',
                'subCategorySlug' => '[a-z]+',
                'productSlug' => '^[a-z0-9]+(?:-[a-z0-9]+)*$' // https://ihateregex.io/expr/url-slug/
            ]);

            
Route::get('/c/{categorySlug}/s/{subCategorySlug}/',
            [App\Http\Controllers\Front\SubCategoryController::class, 'index'])->where([
                'categorySlug' => '[a-z]+',
                'subCategorySlug' => '[a-z]+',
            ]);
            
Route::get('/c/{categorySlug}',
            [App\Http\Controllers\Front\CategoryController::class, 'index'])->where([
                'categorySlug' => '[a-z]+',
            ]);


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


