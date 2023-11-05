<?php

use App\Http\Controllers\Admin\BankController as AdminBankController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Management\BankATMController;
use App\Http\Controllers\Management\BankController;
use App\Http\Controllers\Management\HomeController;
use App\Http\Controllers\Management\ProfileController;
use App\Http\Controllers\Management\RechargeCardController;
use App\Models\Role;
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
/*
|--------------------------------------------------------------------------
| Home page
|--------------------------------------------------------------------------
 */
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard.index');
    }
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
            Route::post('/', [ProfileController::class, 'update'])->name('information.update');
        });
        // card
        Route::prefix('payment')->group(function () {
            Route::prefix('phone-card')->group(function () {
                Route::get('/', function () {
                    return view('management.pages.recharge.phoneCard.index');
                })->name('phoneCard.index');
                Route::post('/', [RechargeCardController::class, 'store'])->name('phoneCard.store');
            });
            // atm
            Route::prefix('atm')->group(function () {
                Route::get('/', [BankATMController::class, 'index'])->name('bank.atm.index');
            });
        });
        Route::prefix('ajax-manage')->group(function () {
            Route::prefix('payment')->group(function () {
                Route::get('recharge-card-history', [RechargeCardController::class, 'ajaxGetRechargeCardHistory'])->name('ajax.rechargeCardHistory.list');
                Route::get('bank-history', [BankATMController::class, 'ajaxGetBankHistory'])->name('ajax.ajaxGetBankHistory.list');
            });
        });
        Route::post('new_update', [HomeController::class, 'newUpdate'])->name('home.new-update');
    });
    // admin manager
    Route::group(['prefix' => 'qladmin', 'middleware' => ['role:' . Role::ROLE_ADMIN]], function () {
        // dashboard
        Route::prefix('/')->group(function () {
            Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard.index');
        });
        // User
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
            Route::post('create', [UserController::class, 'create'])->name('admin.user.create');
            Route::post('show', [UserController::class, 'show'])->name('admin.user.show');
            Route::post('update', [UserController::class, 'update'])->name('admin.user.update');
            Route::get('addPrice', [UserController::class, 'addPrice'])->name('admin.user.addPrice');
            Route::post('addMoney', [UserController::class, 'addMoney'])->name('admin.user.addMoney');
            Route::get('subtractPrice', [UserController::class, 'subtractPrice'])->name('admin.user.subtractPrice');
            Route::post('subtractMoney', [UserController::class, 'subtractMoney'])->name('admin.user.subtractMoney');
            Route::get('export', [UserController::class, 'export'])->name('admin.user.export');
            Route::post('export_data', [UserController::class, 'exportData'])->name('admin.user.export_data');
            Route::get('upgrade', [UserController::class, 'upgrade'])->name('admin.user.upgrade');
            Route::post('upgrade_user', [UserController::class, 'upgradeUser'])->name('admin.user.upgrade_user');
        });
        // Notifications
        Route::prefix('notifications')->group(function () {
            Route::get('/', [NotificationController::class, 'notifications'])->name('admin.notification.index');
            Route::get('show_last_notify', [NotificationController::class, 'show_last_notify'])->name('admin.notification.show_last_notify');
        });
        // Payment
        Route::prefix('payment')->group(function () {
            Route::get('/', [PaymentController::class, 'index'])->name('admin.payment.index');
            Route::post('find_repeated', [PaymentController::class, 'findRepeatedPayments'])->name('admin.payment.find_repeated');
            Route::post('find_duplicate', [PaymentController::class, 'findDuplicatePayments'])->name('admin.payment.find_duplicate');
        });
        // ajax
        Route::prefix('ajax')->group(function () {
            Route::prefix('users')->group(function () {
                Route::get('/', [UserController::class, 'ajaxGetUsers'])->name('admin.ajax.user.list');
            });
            Route::prefix('notifications')->group(function () {
                Route::get('/', [NotificationController::class, 'ajaxGetNotifications'])->name('admin.ajax.notification.list');
            });
            Route::prefix('payments')->group(function () {
                Route::get('/', [PaymentController::class, 'ajaxGetPayments'])->name('admin.ajax.');
            });
        });

        Route::prefix('banks')->group(function () {
            Route::get('/', [AdminBankController::class, 'index'])->name('admin.bank.index');
            Route::post('/store', [AdminBankController::class, 'store'])->name('admin.bank.store');
            Route::post('/show', [AdminBankController::class, 'show'])->name('admin.bank.show');
            Route::post('/update', [AdminBankController::class, 'update'])->name('admin.bank.update');
            Route::post('/delete', [AdminBankController::class, 'destroy'])->name('admin.bank.delete');
        });

    });
});


/*
|--------------------------------------------------------------------------
| Route handle callback
|--------------------------------------------------------------------------
 */
Route::get('recharge-phone-card/callback', [RechargeCardController::class, 'rechargeCardCallback'])->name('phoneCard.rechargeCardCallback');
Route::get('bank/mb-callback', [BankController::class, 'MBBCallback'])->name('bank.MBBCallback');
