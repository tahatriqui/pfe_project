<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\GlobalAdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\UserController;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/',
    [Controller::class,"welcome"]
)->name('welcome');

Auth::routes();


Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/details/{id}', [HomeController::class, 'details'])->name('details');
    Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
    Route::get('/addtocart/{id}', [HomeController::class, 'addtocart'])->name('addtocart');
    Route::delete('/clearCart', [HomeController::class, 'clearCart'])->name('clear.cart');
    Route::delete('/cart/delete/{id}', [HomeController::class, 'delete'])->name('cart.delete');

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('cat.index');
        Route::get('/addPage', [CategoryController::class, 'addPage'])->name('cat.addPage');
        Route::post('/add', [CategoryController::class, 'add'])->name('cat.add');
        Route::get('/modPage/{id}', [CategoryController::class, 'modPage'])->name('cat.modPage');
        Route::put('/mod/{id}', [CategoryController::class, 'mod'])->name('cat.mod');
        Route::delete('/delete/{id}', [CategoryController::class, 'delete'])->name('cat.delete');
    });

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user.index');
        Route::delete('/delete/{id}', [UserController::class, 'delete'])->name('user.delete');
    });

    Route::prefix('notification')->group(function () {
        Route::get('/', [NotificationController::class, 'index'])->name('not.index');
        Route::get('/{id}', [NotificationController::class, 'not'])->name('not.check');
        Route::get('/delete/{id}', [NotificationController::class, 'delete'])->name('not.delete');
    });
});
