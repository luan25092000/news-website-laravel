<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;

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

// Admin
Route::group(['prefix' => 'ad', 'as' => 'ad.', 'namespace' => 'Admin'], function() {
    // Login, logout
    Route::get('login', [LoginController::class, 'showLoginPage'])->name('login-page');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
});
