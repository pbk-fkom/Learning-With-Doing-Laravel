<?php

use App\Http\Controllers\Customer\TransactionController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Customer\CartController;

Route::get('/', function (Request $request) {
    $products = Product::where("name", "LIKE", "%" . $request->get("search") . "%")->get();

    return view('welcome', ['products' => $products]);
});

Route::get('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/login', [AuthController::class, 'authenticate'])->name('admin.authenticate');
Route::resource('/admin/product', ProductController::class);
Route::resource('/carts', CartController::class);
Route::resource('/transaction', TransactionController::class);
