<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::controller(App\Http\Controllers\HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/home', 'index')->name('home');
    Route::get('/products', 'products')->name('products');
    Route::get('/categories', 'categories')->name('categories');
    Route::get('/blogs', 'blogs')->name('blogs');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/about', 'about')->name('about');
    Route::get('/team', 'team')->name('team');
    Route::get('/category/{id}', 'category_detail')->name('category.detail');
});
Auth::routes();

Route::get('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');
Route::get('/admin/login', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');
Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');
    Route::get('/categories', [\App\Http\Controllers\AdminController::class, 'categories'])->name('admin.categories');
    Route::post('/categories/store', [\App\Http\Controllers\AdminController::class, 'store_category'])->name('store.category');
    Route::post('/categories/{id}', [\App\Http\Controllers\AdminController::class, 'update_category'])->name('update.category');
    Route::post('/categories/delete/{id}', [\App\Http\Controllers\AdminController::class, 'delete_category'])->name('delete.category');
});