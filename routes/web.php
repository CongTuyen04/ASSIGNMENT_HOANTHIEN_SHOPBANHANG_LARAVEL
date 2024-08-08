<?php

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


    // Front
Route::get('/', [App\Http\Controllers\Front\HomeController::class, 'index']);

Route::prefix('shop')->group(function () {
    Route::get('/product/{id}', [App\Http\Controllers\Front\ShopController::class, 'show']);
    Route::post('/product/{id}', [App\Http\Controllers\Front\ShopController::class, 'postComment']);
    Route::get('/', [App\Http\Controllers\Front\ShopController::class, 'index']);
    Route::get('/category/{categoryName}', [App\Http\Controllers\Front\ShopController::class, 'category']);
});

Route::prefix('cart')->group(function () {
    Route::get('/', [App\Http\Controllers\Front\CartController::class,'index']);
    
    Route::get('/add/{id}', [App\Http\Controllers\Front\CartController::class,'add']);
    
    
});

// account front
Route::prefix('account')->group(function () {
    Route::get('login', [App\Http\Controllers\Front\AccountController::class, 'login']);
    Route::post('login', [App\Http\Controllers\Front\AccountController::class, 'checkLogin']);

    Route::get('logout', [App\Http\Controllers\Front\AccountController::class, 'logout']);

    Route::get('register', [App\Http\Controllers\Front\AccountController::class, 'register']);
    Route::post('register', [App\Http\Controllers\Front\AccountController::class, 'postRegister']);

    Route::prefix('my-order')->middleware('CheckMemberLogin')->group(function () {
        // Route::get('CheckMemberLogin', [App\Http\Controllers\Front\AccountController::class, 'login']);
    });
});

// ADMIN
Route::prefix('admin')->middleware('CheckAdminLogin')->group(function () {
    Route::get('', [App\Http\Controllers\Admin\UserController::class, 'index']);

    Route::resource('user', App\Http\Controllers\Admin\UserController::class);
    Route::resource('category', App\Http\Controllers\Admin\ProductCategoryController::class);
    Route::resource('product/{product_id}/image', App\Http\Controllers\Admin\ProductImageController::class);
    Route::resource('product/{product_id}/detail', App\Http\Controllers\Admin\ProductDetailController::class);
    Route::resource('product', App\Http\Controllers\Admin\ProductController::class);


    Route::prefix('login')->group(function () {
        Route::get('', [App\Http\Controllers\Admin\HomeController::class, 'getLogin'])->withoutMiddleware('CheckAdminLogin');
        Route::post('', [App\Http\Controllers\Admin\HomeController::class, 'postLogin'])->withoutMiddleware('CheckAdminLogin');
    });

    Route::get('logout', [App\Http\Controllers\Admin\HomeController::class,'logout']);
});









// Route::get('/detail', function () {
//     return view('front.product');
// });

// Route::get('/shopping-cart', function () {
//     return view('front.shopping-cart');
// });
// Route::get('/check-out', function () {
//     return view('front.check-out');
// });
// Route::get('/contact', function () {
//     return view('front.contact');
// });

