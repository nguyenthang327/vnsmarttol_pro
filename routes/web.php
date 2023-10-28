<?php

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

/*
|--------------------------------------------------------------------------
| Home page
|--------------------------------------------------------------------------
 */

Route::get('/', function () {
    return view('homepage.pages.homepage');
})->name('homepage');

/*
|--------------------------------------------------------------------------
| Route auth
|--------------------------------------------------------------------------
 */
Route::prefix('/auth')->group(function () {
    Route::get('/login', function () {
        return view('homepage.pages.login');
    })->name('login.index');
    Route::get('/register', function () {
        return view('homepage.pages.register');
    })->name('register.index');
    Route::get('/forgot-password', function () {
        return view('homepage.pages.forgot-password');
    })->name('forgotPassword.index');
});

/*
|--------------------------------------------------------------------------
| Route management
|--------------------------------------------------------------------------
 */

// dashboard
Route::prefix('/dashboard')->group(function () {
    Route::get('/', function () {
        return view('management.pages.dashboard.index');
    })->name('dashboard.index');
});

// information
Route::prefix('/information')->group(function () {
    Route::get('/', function () {
        return view('management.pages.information.index');
    })->name('information.index');
});

// card

Route::prefix('/phone-card')->group(function () {
    Route::get('/', function () {
        return view('management.pages.recharge.phoneCard.index');
    })->name('phoneCard.index');
});


