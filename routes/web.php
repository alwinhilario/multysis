<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use App\Mail\RegistrationMailController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect(route('login.index'));
});

// Home
Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::get('/home/logout', [HomeController::class, 'logout'])->name('home.logout');

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login/login', [LoginController::class, 'login'])->name('login.login');

// Registration
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
Route::get('/register/verify', [RegisterController::class, 'verify'])->name('register.verify');

// Products
Route::get('/home/products', [ProductsController::class, 'index'])->name('products.index');

// Order
Route::post('/home/orders', [OrdersController::class, 'store'])->name('orders.store');
