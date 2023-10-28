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

Route::get('/', function () {
    return view('homepage.pages.homepage');
})->name('homepage');

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
