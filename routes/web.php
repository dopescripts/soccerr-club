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
    Route::get('/product/{slug}', 'product')->name('product');
    Route::get('/categories', 'categories')->name('categories');
    Route::get('/blogs', 'blogs')->name('blogs');
    Route::get('/contact', 'contact')->name('contact');
    Route::get('/about', 'about')->name('about');
    Route::get('/team', 'team')->name('team');
    Route::get('/category/{id}', 'category_detail')->name('category.detail');
    Route::get('/blog/{slug}', 'blog_detail')->name('blog.detail');
    Route::get('/checkout/{id}', 'checkout')->name('checkout');
});
Route::controller(App\Http\Controllers\CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart');
    Route::get('/cart/add/{slug}', 'add')->name('cart.add');
    Route::get('/cart/remove/{slug}', 'remove')->name('cart.remove');
});
Route::controller(App\Http\Controllers\WishlistController::class)->group(function () {
    Route::get('/wishlist', 'index')->name('wishlist');
    Route::get('/wishlist/add/{slug}', 'add')->name('wishlist.add');
    Route::get('/wishlist/remove/{slug}', 'remove')->name('wishlist.remove');
});
Route::middleware(['auth'])->group(function () {
    Route::post('/place-order', [App\Http\Controllers\OrderController::class, 'place_order'])->name('place.order');
});
Auth::routes();
Route::get('/login', [App\Http\Controllers\HomeController::class, 'login'])->name('login');
Route::get('/admin/login', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.login');

Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');
    Route::get('/categories', [\App\Http\Controllers\AdminController::class, 'categories'])->name('admin.categories');
    Route::post('/categories/store', [\App\Http\Controllers\AdminController::class, 'store_category'])->name('store.category');
    Route::post('/categories/{id}', [\App\Http\Controllers\AdminController::class, 'update_category'])->name('update.category');
    Route::get('/categories/delete/{id}', [\App\Http\Controllers\AdminController::class, 'delete_category'])->name('delete.category');
    Route::get('/vendors', [\App\Http\Controllers\VendorController::class, 'vendor'])->name('admin.vendors');
    Route::post('/vendors/add', [\App\Http\Controllers\VendorController::class, 'vendor_store'])->name('vendor.store');
    Route::get('/vendors/delete/{id}', [\App\Http\Controllers\VendorController::class, 'delete_vendor'])->name('delete.vendor');
    Route::get('products', [\App\Http\Controllers\ProductsController::class, 'products'])->name('admin.products');
    Route::get('product/add', [\App\Http\Controllers\ProductsController::class, 'products_add'])->name('products.create');
    Route::post('products/create', [\App\Http\Controllers\ProductsController::class, 'products_create'])->name('products.store');
    Route::get('products/update/{slug}', [\App\Http\Controllers\ProductsController::class, 'products_edit'])->name('products.edit');
    Route::post('products/update/{id}', [\App\Http\Controllers\ProductsController::class, 'products_update'])->name('product.update');
    Route::get('products/delete/{id}', [\App\Http\Controllers\ProductsController::class, 'products_delete'])->name('products.destroy');
    Route::get('/team', [\App\Http\Controllers\TeamController::class, 'index'])->name('admin.team');
    Route::post('/team/store', [\App\Http\Controllers\TeamController::class, 'store'])->name('team.store');
    Route::post('/team/update/{id}', [\App\Http\Controllers\TeamController::class, 'update'])->name('team.update');
    Route::get('/team/delete/{id}', [\App\Http\Controllers\TeamController::class, 'delete'])->name('team.delete');
    Route::get('/product/deactivate/{id}', [\App\Http\Controllers\ProductsController::class, 'deactivate'])->name('product.deactivate');
    Route::get('/product/activate/{id}', [\App\Http\Controllers\ProductsController::class, 'activate'])->name('product.activate');
    Route::get('/users', [\App\Http\Controllers\AdminController::class, 'users'])->name('admin.users');
    Route::get('/orders/pending', [\App\Http\Controllers\AdminController::class, 'pending'])->name('admin.orders.pending');
    Route::post('/orders/approve', [\App\Http\Controllers\OrderController::class, 'approve'])->name('approve.order');
    Route::get('/orders/completed', [\App\Http\Controllers\AdminController::class, 'completed'])->name('completed.orders');
    Route::get('/orders/completed/detail/{order_number}', [\App\Http\Controllers\AdminController::class, 'order_detail'])->name('order.details');
});
