<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Category;
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


Route::get('/', [HomeController::class, 'index'])->name('public.index');
Route::get('/about', [HomeController::class, 'about'])->name('public.about');
Route::get('/contact', [HomeController::class, 'contact'])->name('public.contact');
Route::get('/shop/{category?}', [HomeController::class, 'shop'])->name('public.shop'); // danh sách sản phẩm theo danh mục
Route::get('/product/{product}', [HomeController::class, 'product'])->name('public.product'); // chi tiết sản phẩm theo id

Route::get('/logout', [HomeController::class, 'logout'])->name('public.logout');
Route::get('/login', [HomeController::class, 'login'])->name('public.login');
Route::post('/login', [HomeController::class, 'post_login']);


Route::post('/register', [HomeController::class, 'post_register'])->name('public.register');



Route::group(['prefix' => 'cart'], function() {
    Route::get('/', [CartController::class, 'view'])->name('cart.view');
    Route::post('/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::put('/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::get('/delete/{id}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
});

Route::group(['prefix' => 'order', 'middleware' => 'customer'], function() {
    Route::get('/order-checkout', [HomeController::class, 'checkout'])->name('order.checkout');
    Route::post('/order-checkout', [HomeController::class, 'post_checkout']);

    Route::get('/order-success', [HomeController::class, 'order_success'])->name('order.success');
    Route::get('/order-failed', [HomeController::class, 'order_failed'])->name('order.failed');

    Route::get('/order-history', [HomeController::class, 'order_history'])->name('order.history');
    Route::get('/order-detail/{order}', [HomeController::class, 'order_detail'])->name('order.detail');
});






Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/login', [AdminController::class, 'check_login']);
Route::get('/admin/register', [AdminController::class, 'register'])->name('admin.register');
Route::post('/admin/register', [AdminController::class, 'check_register']);
Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');



Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function() {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    Route::resources([
        'category' => CategoryController::class,
        'product' => ProductController::class,
        'user' => UserController::class,
        'order' => OrderController::class
        
    ]);
    Route::get('/order_detail', [OrderController::class, 'dtl'])->name('admin.detail');
});
