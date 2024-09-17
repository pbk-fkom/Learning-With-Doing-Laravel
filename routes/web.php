<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Customer\TransactionController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthController as AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Customer\CartController;

Route::get('/', function (Request $request) {
    $products = Product::where("name", "LIKE", "%" . $request->get("search") . "%")->get();

    return view('welcome', ['products' => $products]);
})->name("welcome");

// Admin
Route::get('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/login', [AuthController::class, 'authenticate'])->name('admin.authenticate');
Route::resource('/admin/product', ProductController::class);
Route::get('/admin/dashboard', DashboardController::class);
Route::get('/admin/transaction', AdminTransactionController::class);

// Customer
Route::get("/login", [AuthController::class, 'login'])->name("login");
Route::post("/login", [AuthController::class, 'authenticate'])->name("authenticate");
Route::post("/logout", [AuthController::class, 'logout'])->name("logout");

Route::get("/register", [AuthController::class, 'register'])->name('register');
Route::post("/register", [AuthController::class, 'registration'])->name('registration');

Route::resource('/carts', CartController::class);
Route::resource('/transaction', TransactionController::class);
