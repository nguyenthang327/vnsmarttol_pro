<?php

use App\Http\Controllers\Auth\LoginController;
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
    Route::get('/login', [LoginController::class, 'index'])->name('login.index');
    Route::post('/login', [LoginController::class, 'authenticate'])->name('login.authenticate');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

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

 Route::group(['middleware' => ['auth']], function () {
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

});
