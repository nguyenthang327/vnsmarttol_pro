<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Management\HomeController;
use App\Http\Controllers\Management\ProfileController;
use App\Models\Role;
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
Route::get('login', [LoginController::class, 'index'])->name('login.index');
Route::post('login', [LoginController::class, 'authenticate'])->name('login.authenticate');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'index'])->name('register.index');
Route::post('register', [RegisterController::class, 'register'])->name('register');
Route::get('forgot_pass', [ForgotPasswordController::class, 'index'])->name('forgotPassword.index');
Route::post('forgot_pass', [ForgotPasswordController::class, 'forgotPassword'])->name('forgotPassword');
Route::post('change_pass_by_otp', [ForgotPasswordController::class, 'changePassByOTP'])->name('changePassByOTP');
/*
|--------------------------------------------------------------------------
| Route management
|--------------------------------------------------------------------------
 */
Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['role:' . implode("|", [Role::ROLE_ADMIN, Role::ROLE_CLIENT])]], function () {
        // dashboard
        Route::prefix('home')->group(function () {
            Route::get('/', [HomeController::class, 'index'])->name('dashboard.index');
        });
        // information
        Route::prefix('profile')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('information.index');
        });
        // card
        Route::prefix('payment')->group(function () {
            Route::prefix('phone-card')->group(function () {
                Route::get('/', function () {
                    return view('management.pages.recharge.phoneCard.index');
                })->name('phoneCard.index');
            });
        });
    });
    // admin manager
    Route::group(['prefix' => 'qladmin', 'middleware' => ['role:' . Role::ROLE_ADMIN]], function () {
        // dashboard
        Route::prefix('/')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.index');
        });
        // user
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
            Route::post('create', [UserController::class, 'create'])->name('admin.user.create');
        });
        // ajax
        Route::prefix('ajax')->group(function () {
            Route::prefix('users')->group(function () {
                Route::get('/', [UserController::class, 'ajaxGetUser'])->name('admin.ajax.user.list');
            });
        });

    });
});
