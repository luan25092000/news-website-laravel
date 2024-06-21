<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\StaffController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\SettingController;
use Illuminate\Support\Facades\Auth;

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
    Route::get('/', function() {
        if (Auth::guard('admin')->check()) { // check admin login
            if (Auth::guard('admin')->user()->role == 0) {
                return redirect()->route('ad.dashboard');
            } else {
                return redirect()->route('ad.news.index');
            }
        } else {
            return redirect()->route('ad.login-page');
        }
    });
    // Login, logout
    Route::get('login', [LoginController::class, 'showLoginPage'])->name('login-page');
    Route::post('login', [LoginController::class, 'login'])->name('login');
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');
    Route::group(['middleware' => 'check.admin.login'], function() {
        // Dashboard
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('check.role.admin');
        // Category
        Route::group(['prefix' => 'category', 'as' => 'category.', 'middleware' => 'check.role.admin'], function() {
            Route::get('/', [CategoryController::class, 'index'])->name('index');
            Route::get('add', [CategoryController::class, 'create'])->name('create');
            Route::post('add', [CategoryController::class, 'store'])->name('store');
            Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('edit');
            Route::post('edit/{id}', [CategoryController::class, 'update'])->name('update');
            Route::get('delete/{id}', [CategoryController::class, 'destroy'])->name('delete');
        });
        // News
        Route::group(['prefix' => 'news', 'as' => 'news.'], function() {
            Route::get('/', [NewsController::class, 'index'])->name('index');
            Route::get('add', [NewsController::class, 'create'])->name('create');
            Route::post('add', [NewsController::class, 'store'])->name('store');
            Route::get('edit/{id}', [NewsController::class, 'edit'])->name('edit');
            Route::post('edit/{id}', [NewsController::class, 'update'])->name('update');
            Route::get('delete/{id}', [NewsController::class, 'destroy'])->name('delete');
            Route::get('show/{id}', [NewsController::class, 'show'])->name('show');
        });
        // Staff
        Route::group(['prefix' => 'staff', 'as' => 'staff.', 'middleware' => 'check.role.admin'], function() {
            Route::get('/', [StaffController::class, 'index'])->name('index');
            Route::get('add', [StaffController::class, 'create'])->name('create');
            Route::post('add', [StaffController::class, 'store'])->name('store');
            Route::get('edit/{id}', [StaffController::class, 'edit'])->name('edit');
            Route::post('edit/{id}', [StaffController::class, 'update'])->name('update');
            Route::get('update-status/{id}/{status}', [StaffController::class, 'updateStatus'])->name('update-status');
        });
        // User
        Route::group(['prefix' => 'user', 'as' => 'user.', 'middleware' => 'check.role.admin'], function() {
            Route::get('/', [UserController::class, 'index'])->name('index');
            Route::get('update-status/{id}/{status}', [UserController::class, 'updateStatus'])->name('update-status');
        });
        // Comment
        Route::group(['prefix' => 'comment', 'as' => 'comment.'], function() {
            Route::get('/', [CommentController::class, 'index'])->name('index');
            Route::get('delete/{id}', [CommentController::class, 'destroy'])->name('delete');
        });
        // Setting
        Route::group(['prefix' => 'setting', 'as' => 'setting.', 'middleware' => 'check.role.admin'], function() {
            Route::get('add', [SettingController::class, 'create'])->name('create');
            Route::post('add', [SettingController::class, 'store'])->name('store');
        });
    });
});
