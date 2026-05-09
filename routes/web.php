<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WishlistController;
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
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/home', 'index')->name('home.slash');
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
Route::controller(CartController::class)->group(function () {
    Route::get('/cart', 'index')->name('cart');
    Route::post('/cart/add/{slug}', 'add')->name('cart.add');
    Route::delete('/cart/remove/{slug}', 'remove')->name('cart.remove');
});
Route::controller(WishlistController::class)->group(function () {
    Route::get('/wishlist', 'index')->name('wishlist');
    Route::post('/wishlist/add/{slug}', 'add')->name('wishlist.add');
    Route::delete('/wishlist/remove/{slug}', 'remove')->name('wishlist.remove');
});
Route::middleware(['auth'])->group(function () {
    Route::post('/place-order', [OrderController::class, 'place_order'])->name('place.order');
    Route::post('/add-review', [ReviewController::class, 'add_review'])->name('add.review');
});
Auth::routes();
Route::get('/login', [HomeController::class, 'login'])->name('login');
Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');

Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.home');
    Route::get('/categories', [AdminController::class, 'categories'])->name('admin.categories');
    Route::post('/categories/store', [AdminController::class, 'store_category'])->name('store.category');
    Route::post('/categories/{id}', [AdminController::class, 'update_category'])->name('update.category');
    Route::get('/categories/delete/{id}', [AdminController::class, 'delete_category'])->name('delete.category');
    Route::get('/vendors', [VendorController::class, 'vendor'])->name('admin.vendors');
    Route::post('/vendors/add', [VendorController::class, 'vendor_store'])->name('vendor.store');
    Route::get('/vendors/delete/{id}', [VendorController::class, 'delete_vendor'])->name('delete.vendor');
    Route::get('products', [ProductsController::class, 'products'])->name('admin.products');
    Route::get('product/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('products/store', [ProductsController::class, 'store'])->name('products.store');
    Route::get('products/update/{slug}', [ProductsController::class, 'edit'])->name('products.edit');
    Route::put('products/update/{id}', [ProductsController::class, 'update'])->name('product.update');
    Route::delete('products/delete/{id}', [ProductsController::class, 'delete'])->name('products.destroy');
    Route::get('/team', [TeamController::class, 'index'])->name('admin.team');
    Route::post('/team/store', [TeamController::class, 'store'])->name('team.store');
    Route::post('/team/update/{id}', [TeamController::class, 'update'])->name('team.update');
    Route::get('/team/delete/{id}', [TeamController::class, 'delete'])->name('team.delete');
    Route::get('/product/deactivate/{id}', [ProductsController::class, 'deactivate'])->name('product.deactivate');
    Route::get('/product/activate/{id}', [ProductsController::class, 'activate'])->name('product.activate');
    Route::get('/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/orders/pending', [AdminController::class, 'pending'])->name('admin.orders.pending');
    Route::post('/orders/approve', [OrderController::class, 'approve'])->name('approve.order');
    Route::get('/orders/completed', [AdminController::class, 'completed'])->name('completed.orders');
    Route::get('/orders/completed/detail/{order_number}', [AdminController::class, 'order_detail'])->name('order.details');
});
