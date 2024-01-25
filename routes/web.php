<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::get('/', [ProductController::class, 'index']);
Route::get('create', [ProductController::class, 'create']);
Route::post('store', [ProductController::class, 'store']);
Route::get('edit/{id}', [ProductController::class, 'edit']);
Route::put('update/{id}', [ProductController::class, 'update']);
Route::get('delete/{id}', [ProductController::class, 'delete']);