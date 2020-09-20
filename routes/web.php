<?php

use App\Http\Controllers\PageController;
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

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/checkout', [PageController::class, 'checkout'])->name('checkout');
Route::get('/order-confirmed', [PageController::class, 'orderConfirmed'])->name('orderConfirmed');
Route::get('/order-history', [PageController::class, 'orderHistory'])->name('order-history');
Route::get('/login', [PageController::class, 'orderConfirmed'])->name('login');
Route::get('/logout', [PageController::class, 'logout'])->name('logout');
