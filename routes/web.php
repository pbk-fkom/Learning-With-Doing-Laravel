<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ClassroomController;

Route::get('/', function () {
    return redirect("/login");
});

Route::resource("/dosen", DosenController::class)->middleware("auth");
Route::resource("/classroom", ClassroomController::class)->middleware("auth");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');