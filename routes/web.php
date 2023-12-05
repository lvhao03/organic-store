<?php
use App\Http\Controllers\reviewController;

use App\Http\Controllers\adminController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [productController::class, 'index']);
Route::get('/shop', [productController::class, 'shop']);
Route::get('/product/{id}', [productController::class, 'detail']);
Route::get('/cart', [productController::class, 'cart']);
Route::get('/addToCart/{id}/{quantity}', [productController::class, 'addToCart']);
Route::get('/deleteCart/{id}/', [productController::class, 'deleteCart']);
Route::get('/deleteAllCart', [productController::class, 'deleteAllCart']);

Route::get('/login', [adminController::class, 'login']);
Route::post('/login', [adminController::class, 'login_']);
Route::get('/register', [adminController::class, 'register']);
Route::post('/register', [adminController::class, 'register_']);

Route::get('/logout', [adminController::class, 'logout']);
Route::get('/admin', function () {
    return view('admin.main');
});

Route::prefix('admin/product')->group(function(){

    Route::get('list', [productController::class, 'adminIndex']);
    
    Route::get('add', [productController::class, 'add']);
    Route::post('add', [productController::class, 'add_']);
    
    Route::get('edit/{id}', [productController::class, 'edit']);
    Route::post('edit', [productController::class, 'edit_']);
    
    Route::get('delete/{id}', [productController::class, 'delete']);
});

Route::prefix('admin/category')->group(function(){

    Route::get('list', [categoryController::class, 'index']);
    
    Route::get('add', [categoryController::class, 'add']);
    Route::post('add', [categoryController::class, 'add_']);
    
    Route::get('edit/{id}', [categoryController::class, 'edit']);
    Route::post('edit', [categoryController::class, 'edit_']);
    
    Route::get('delete/{id}', [categoryController::class, 'delete']);
});

