<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

// ✅ Admin + General Controllers
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\Admin\ReportsController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ExportController;

// ✅ Retailer Controllers
use App\Http\Controllers\Retailer\RetailerProductController;
use App\Http\Controllers\Retailer\CartController as RetailerCartController;
use App\Http\Controllers\Retailer\WholesalerCartController;
use App\Http\Controllers\Retailer\RetailerWholesalerOrderController;

// ✅ Wholesaler Controllers
use App\Http\Controllers\Wholesaler\WholesalerProductController;
use App\Http\Controllers\Wholesaler\WholesalerOrderController;
use App\Http\Controllers\Wholesaler\WholesalerProductBrowseController;

// ✅ Cooperative Controllers
use App\Http\Controllers\CoffeeBatchController;

// ✅ Customer Controllers
use App\Http\Controllers\Customer\ProductController as CustomerProductController;
use App\Http\Controllers\Customer\CartController as CustomerCartController;
use App\Http\Controllers\Customer\OrderController as CustomerOrderController;

// ✅ Supply Module Controllers
use App\Http\Controllers\SupplyController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CoffeeController;


use App\Models\WholesalerProduct;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', fn () => view('welcome'));



// ✅ RETAILER ROUTES

Route::middleware(['auth'])->prefix('retailer')->name('retailer.')->group(function () {
    Route::get('/', fn() => view('retailer.retailer'))->name('dashboard');

    Route::get('/products', [RetailerProductController::class, 'index'])->name('products');
    Route::get('/products/create', [RetailerProductController::class, 'create'])->name('products.create');
    Route::post('/products', [RetailerProductController::class, 'store'])->name('products.store');

    Route::get('/wholesaler-products', [WholesalerProductBrowseController::class, 'showWholesalerProducts'])->name('wholesaler.products');

    Route::get('/cart', [RetailerCartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [RetailerCartController::class, 'add'])->name('cart.add');
    Route::post('/cart/increase/{id}', [RetailerCartController::class, 'increase'])->name('cart.increase');
    Route::post('/cart/decrease/{id}', [RetailerCartController::class, 'decrease'])->name('cart.decrease');
    Route::delete('/cart/remove/{id}', [RetailerCartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [RetailerCartController::class, 'clear'])->name('cart.clear');

    Route::get('/wholesaler-cart', [WholesalerCartController::class, 'index'])->name('wholesaler.cart');
    Route::post('/wholesaler-cart/add', [WholesalerCartController::class, 'add'])->name('wholesaler.cart.add');
    Route::delete('/wholesaler-cart/remove/{id}', [WholesalerCartController::class, 'remove'])->name('wholesaler.cart.remove');
    Route::post('/wholesaler-cart/clear', [WholesalerCartController::class, 'clear'])->name('wholesaler.cart.clear');

    Route::get('/wholesaler-cart/checkout', [RetailerWholesalerOrderController::class, 'create'])->name('wholesaler.checkout');
    Route::post('/wholesaler-cart/checkout', [RetailerWholesalerOrderController::class, 'store'])->name('wholesaler.checkout.store');
    Route::get('/wholesaler-orders', [RetailerWholesalerOrderController::class, 'index'])->name('wholesaler.orders');
    Route::get('/wholesaler-orders/{order}/invoice', [RetailerWholesalerOrderController::class, 'generateInvoice'])->name('wholesaler.invoice');
});


// ✅ CUSTOMER ORDER ROUTES

Route::middleware(['auth'])->group(function () {
    Route::get('/orders/create', [OrderController::class, 'create'])->name('orders.create');
    Route::get('/checkout', [OrderController::class, 'create'])->name('orders.checkout');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}/invoice', [OrderController::class, 'generateInvoice'])->name('orders.invoice');
});


// ✅ COOPERATIVE ROUTES

Route::middleware(['auth'])->prefix('cooperative')->name('cooperative.')->group(function () {
    Route::get('/', fn () => view('cooperative.cooperative'))->name('dashboard');

    Route::prefix('batches')->name('batches.')->group(function () {
        Route::get('/', [CoffeeBatchController::class, 'index'])->name('index');
        Route::get('/create', [CoffeeBatchController::class, 'create'])->name('create');
        Route::post('/', [CoffeeBatchController::class, 'store'])->name('store');
    });

    // ✅ Supply Module Routes for Cooperative
    Route::resource('supplies', SupplyController::class)->names('supplies');
    Route::resource('suppliers', SupplierController::class)->names('suppliers');
    Route::resource('coffees', CoffeeController::class)->names('coffees');
});


// ✅ WHOLESALER ROUTES

Route::middleware(['auth'])->prefix('wholesaler')->name('wholesaler.')->group(function () {
    Route::get('/', function () {
        $products = \App\Models\WholesalerProduct::where('wholesaler_id', Auth::id())->latest()->get();
        return view('wholesaler.wholesaler', compact('products'));
    })->name('dashboard');

    Route::get('/orders', [WholesalerOrderController::class, 'index'])->name('orders.index');
    Route::get('/products', [WholesalerProductController::class, 'index'])->name('products.index');
    Route::get('/products/create', [WholesalerProductController::class, 'create'])->name('products.create');
    Route::post('/products', [WholesalerProductController::class, 'store'])->name('products.store');
    Route::post('/orders/{order}/status', [WholesalerOrderController::class, 'updateStatus'])->name('orders.updateStatus');
});


// ADMIN ROUTES

Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::post('/orders/{order}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::get('/reports', [ReportsController::class, 'index'])->name('reports.index');
    Route::get('/admin/analytics', [AdminDashboardController::class, 'analytics'])->name('analytics');



    // ✅ Supply Module Routes for Admin
    Route::resource('supplies', SupplyController::class);
    Route::resource('suppliers', SupplierController::class);
    Route::resource('coffees', CoffeeController::class);
});



    Route::get('/supplies-dashboard', [SupplyController::class, 'index'])->name('supplies.dashboard');
    Route::resource('supplies', SupplyController::class)->names('supplies');
    Route::resource('suppliers', SupplierController::class)->names('suppliers');
    Route::resource('coffees', CoffeeController::class)->names('coffees');

   




// CUSTOMER ROUTES
Route::middleware(['auth'])->prefix('customer')->name('customer.')->group(function () {
    Route::get('/', fn () => view('customer.customer'))->name('dashboard');

    Route::get('/products', [CustomerProductController::class, 'index'])->name('products');
    Route::get('/cart', [CustomerCartController::class, 'index'])->name('cart');
    Route::post('/cart/add', [CustomerCartController::class, 'add'])->name('cart.add');
    Route::delete('/cart/remove/{id}', [CustomerCartController::class, 'remove'])->name('cart.remove');
    Route::post('/cart/clear', [CustomerCartController::class, 'clear'])->name('cart.clear');

    Route::get('/checkout', [CustomerOrderController::class, 'create'])->name('checkout');
    Route::post('/checkout', [CustomerOrderController::class, 'store'])->name('checkout.store');
    Route::get('/orders', [CustomerOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}/invoice', [CustomerOrderController::class, 'generateInvoice'])->name('orders.invoice');
});


// PROFILE ROUTES (for profile.update)

Route::middleware(['auth'])->prefix('profile')->name('profile.')->group(function () {
    Route::get('/', [ProfileController::class, 'edit'])->name('edit');
    Route::patch('/', [ProfileController::class, 'update'])->name('update');
    Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
});


// REDIRECT BASED ON USER 

Route::get('/redirect-after-login', function () {
    $user = Auth::user();

    if ($user->is_admin) return redirect()->route('admin.dashboard');
    if ($user->role === 'retailer') return redirect()->route('retailer.dashboard');
    if ($user->role === 'cooperative') return redirect()->route('cooperative.dashboard');
    if ($user->role === 'wholesaler') return redirect()->route('wholesaler.dashboard');
    if ($user->role === 'customer') return redirect()->route('customer.dashboard');

    return redirect('/');
})->middleware('auth');

// Laravel Auth Route
require __DIR__.'/auth.php';