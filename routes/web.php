<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Admin\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;

Route::get('/', function (Request $request) {
    
    $products = Product::where("name", "LIKE", "%" . $request->search . "%") -> get();

    return view('welcome', ['products' => $products]);
});

Route::get('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/login', [AuthController::class, 'authenticate'])->name('admin.authenticate');
Route::resource('/admin/product', ProductController::class);