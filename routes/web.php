<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\SliderController;
use App\Models\Customer;
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

Route::get('/', [FrontendController::class, 'welcome']);

Auth::routes();

Route::prefix('admin')->middleware('auth.basic')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard']);
    Route::resource('categories', CategoryController::class);
    Route::resource('brands', BrandController::class);
    Route::resource('products', ProductController::class);
    Route::resource('sliders', SliderController::class);
    Route::get('/customers', [AdminController::class, 'customers'])->name('customers-view');
    Route::get('/orders', [AdminController::class, 'orders'])->name('orders');
});

Route::prefix('customer')->middleware('guest:customer')->name('customer.')->group(function () {
    Route::get('/register', [CustomerController::class, 'registerView'])->name('register-view');
    Route::post('/register', [CustomerController::class, 'register'])->name('register');
    Route::get('/login', [CustomerController::class, 'loginView'])->name('login-view');
    Route::post('/login', [CustomerController::class, 'login'])->name('login');
});
Route::get('/carts', [FrontendController::class, 'carts'])->name('carts');

Route::post('/customer/logout', [CustomerController::class, 'logout'])->name('customer.logout');

Route::get('/customer/{id}', [CustomerController::class, 'profile'])->name('customer.profile');

Route::get('/brands',[FrontendController::class, 'brandAll'])->name('brands-view');

Route::get('/brands/{brand}', [FrontendController::class,'brandSelect'])->name('brand-select');

Route::get('/products/{product}', [FrontendController::class,'productDetail'])->name('product-detail');

Route::get('/categories',[FrontendController::class, 'categoryAll'])->name('categories-view');

Route::get('/categories/{category}', [FrontendController::class,'categorySelect'])->name('category-select');

// Route::post('/addToCart/{id}',[CustomerController::class, 'addToCart'])->name('add-to-cart');

Route::post('/addToCart', [CustomerController::class, 'addToCart'])->name('product.add-to-cart');

Route::delete('/cartDelete/{id}', [CustomerController::class, 'cartDelete'])->name('cart-delete');

Route::get('/order', [OrderController::class, 'orderView'])->middleware('customer')->name('order-view');

Route::post('/order', [OrderController::class, 'order'])->middleware('customer')->name('order');

Route::get('/orderHistory', [CustomerController::class, 'history'])->middleware('customer')->name('order-history');



