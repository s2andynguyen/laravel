<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UploadController;
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

// Router cho view page
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/blog', [HomeController::class, 'blog']);
Route::get('/blog/post-content', [HomeController::class, 'content']);
Route::get('/checkout', [HomeController::class, 'checkout']);

// Router xử lí phân trang và sort product home page
Route::post('/home/load-product', [HomeController::class, 'loadMore']);

// Router trang sản phẩm page
Route::get('/shop', [HomeController::class, 'shop']);
Route::get('/shop/band/{category?}', [HomeController::class, 'shopbrand']);
Route::get('/shop/product-detail/{product?}', [HomeController::class, 'productDetail']);

// Router xử lí giỏ hàng
Route::get('/cart',[CartController::class, 'showCart']);
Route::post('/cart',[CartController::class, 'update']);
Route::post('/cart/add', [CartController::class, 'addToCart']);
Route::delete('/cart/remove/{product_id?}', [CartController::class, 'removeCart']);

// Router register
Route::get('admin/register', [RegisterController::class, 'index']);
Route::post('admin/register', [RegisterController::class, 'create']);

// Router login
Route::get('admin/login', [LoginController::class, 'index'])->name('login');
Route::post('admin/login/store', [LoginController::class, 'store']);

// Router logout
Route::get('admin/logout', [AdminController::class, 'logout'])->name('logout');

// Router Admin
Route::middleware(['auth','admin'])->group(function() {
    Route::get('admin/main', [AdminController::class, 'index'])->name('admin');

    //category
    Route::prefix('/admin/category')->group(function() {
        Route::get('/add', [CategoryController::class, 'create']);  
        Route::post('/add', [CategoryController::class, 'store']);
        Route::get('/list', [CategoryController::class, 'index']);
        Route::get('/edit/{category}', [CategoryController::class, 'show']);
        Route::post('/edit/{category}', [CategoryController::class, 'update']);
        Route::delete('/destroy', [CategoryController::class, 'destroy']);
    });
    
    // product:
    Route::prefix('admin/product')->group(function() {
        Route::get('/add', [ProductController::class, 'create']);
        Route::post('/add', [ProductController::class, 'store']);
        Route::get('/list', [ProductController::class, 'list']);
        Route::get('/list/filter/{category}', [ProductController::class, 'adminFilter']);
        Route::get('/edit/{product}', [ProductController::class, 'show']);
        Route::post('/edit/{product}', [ProductController::class, 'update']);
        Route::delete('/destroy', [ProductController::class, 'destroy']);
        
        // Upload image
        Route::post('/upload', [UploadController::class, 'store']);
    });
});




