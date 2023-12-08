<?php
use App\Http\Controllers\reviewController;

use App\Http\Controllers\adminController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\productController;
use App\Http\Controllers\userController;
use App\Http\Controllers\orderController;
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

Route::get('/checkout', [orderController::class, 'index']);
Route::post('/checkout', [orderController::class, 'index_']);

Route::get('/admin', function () {
    return view('admin.main');
})->middleware('checkAdmin');

Route::prefix('admin/product')->middleware('checkAdmin')->group(function(){

    Route::get('list', [productController::class, 'adminIndex']);
    
    Route::get('add', [productController::class, 'add']);
    Route::post('add', [productController::class, 'add_']);
    
    Route::get('edit/{id}', [productController::class, 'edit']);
    Route::post('edit', [productController::class, 'edit_']);
    
    Route::get('delete/{id}', [productController::class, 'delete']);
});

Route::prefix('admin/category')->middleware('checkAdmin')->group(function(){

    Route::get('list', [categoryController::class, 'index']);
    
    Route::get('add', [categoryController::class, 'add']);
    Route::post('add', [categoryController::class, 'add_']);
    
    Route::get('edit/{id}', [categoryController::class, 'edit']);
    Route::post('edit', [categoryController::class, 'edit_']);
    
    Route::get('delete/{id}', [categoryController::class, 'delete']);
});

Route::prefix('admin/user')->middleware('checkAdmin')->group(function(){

    Route::get('list', [userController::class, 'index']);
    
    Route::get('add', [userController::class, 'add']);
    Route::post('add', [userController::class, 'add_']);
    
    Route::get('edit/{id}', [userController::class, 'edit']);
    Route::post('edit', [userController::class, 'edit_']);
    
    Route::get('delete/{id}', [userController::class, 'delete']);
});

Route::prefix('admin/order')->middleware('checkAdmin')->group(function(){

    Route::get('list', [orderController::class, 'adminIndex']);
    
    Route::get('add', [orderController::class, 'add']);
    Route::post('add', [orderController::class, 'add_']);
    
    Route::get('edit/{id}', [orderController::class, 'edit']);
    Route::post('edit', [orderController::class, 'edit_']);
    
    Route::get('delete/{id}', [orderController::class, 'delete']);
});
