<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\showAge;
use App\Http\Middleware\authAdmin;
use App\Http\Middleware\CheckAge;
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

Route::get('/', [DashboardController::class, 'index'])->name('home');
Route::resource('products', ProductController::class);

Route::middleware([CheckAge::class])->group(function () {
  Route::get('showage', [showAge::class, 'index']);
});

Route::get('/login', [LoginController::class, 'index'])->name('login');

Route::middleware([authAdmin::class])->group(function () {
  Route::post('/authlogin', [LoginController::class, 'login']);
});
