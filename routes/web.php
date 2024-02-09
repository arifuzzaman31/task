<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;

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

Route::view('/dashboard', 'pages.dashboard');
Route::get('/', function () {
    return view('admin.login');
});
Route::resource('products', ProductController::class);
Route::resource('categories', CategoryController::class);
Route::post('product-purchase/{id}', [ProductController::class, 'productPurchase'])->name('products.purchase');
Route::post('/import-products', [ProductController::class, 'import'])->name('import.products');
Route::get('/export-products', [ProductController::class, 'export'])->name('export.products');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
