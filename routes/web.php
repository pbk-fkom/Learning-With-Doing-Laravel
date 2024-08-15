<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\ClassroomController;

// Route::get('/', function () {
//     return view('hello');
// });

Route::resource("/dosen", DosenController::class);
Route::resource("/classroom", ClassroomController::class);