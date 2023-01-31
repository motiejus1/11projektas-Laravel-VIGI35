<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});


Route::prefix('products')->group(function() {
    Route::get('/',[ProductController::class, 'index'])->name('products.index');
    Route::get('/create',[ProductController::class, 'create'])->name('products.create');
    Route::post('/store',[ProductController::class, 'store'])->name('products.store');
    Route::get('/edit/{product}',[ProductController::class, 'edit'])->name('products.edit');
    Route::post('/update/{product}',[ProductController::class, 'update'])->name('products.update');
    Route::post('/delete/{product}',[ProductController::class, 'destroy'])->name('products.destroy');

});

Route::prefix('categories')->group(function() {
    Route::get('/',[CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create',[CategoryController::class, 'create'])->name('categories.create');
    Route::post('/store',[CategoryController::class, 'store'])->name('categories.store');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
