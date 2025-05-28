<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Models\Category;
use App\Models\Product;

// Home redirect to categories listing
Route::get('/', function () {
    return redirect()->route('categories.index');
});


Route::get('/', function () {
    $categories = Category::all();
    $products = Product::all();
    return view('home', compact('categories', 'products'));
});


// Authentication routes
Route::get('register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);
Route::get('login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
//Route::post('logout', [AuthController::class, 'logout'])->name('logout');


// Protected routes
Route::middleware('auth')->group(function () {
    
    // Categories CRUD: index, create, store, edit, update, destroy
    Route::resource('categories', CategoryController::class);

    // Products CRUD
    Route::resource('products', ProductController::class);

    // Show products by category
    Route::get('category/{category}/products', [ProductController::class, 'productsByCategory'])->name('category.products');
    Route::get('/category/{id}/products', [CategoryController::class, 'productsByCategory'])->name('category.products');
    Route::post('/products/store', [ProductController::class, 'store'])->name('products.store');


    // Cart routes
    Route::get('cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::post('cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

    // Checkout and place order
    Route::get('checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('order/place', [OrderController::class, 'placeOrder'])->name('order.place');

    // Registered users list
    Route::get('users', [UserController::class, 'index'])->name('users.index');

    // User orders listing
   // Route::get('order', [OrderController::class, 'index'])->name('order.index');
   Route::get('/order', [OrderController::class, 'index'])->name('order.index')->middleware('auth');
   Route::get('/items', [ItemController::class, 'index'])->name('items.index');
   Route::get('/orders/{id}', [OrderController::class, 'show'])->name('orders.show');
   
   Route::post('/order/place', [OrderController::class, 'placeOrder'])->name('order.place');
   Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
   Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');


});

