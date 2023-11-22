<?php

use App\Http\Controllers\Admin\BankController as AdminBankController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DiscountController;
use App\Http\Controllers\Admin\HomeSettingController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\PaymentController;
use App\Http\Controllers\Admin\PriceServiceController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\ServicePackController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\Management\BankATMController;
use App\Http\Controllers\Management\BankController;
use App\Http\Controllers\Management\HomeController;
use App\Http\Controllers\Management\ProfileController;
use App\Http\Controllers\Management\RechargeCardController;
use App\Http\Controllers\Management\ReportController;
use App\Http\Controllers\Management\Services\FacebookController;
use App\Http\Controllers\Management\Services\InstagramController;
use App\Http\Controllers\SettingController;
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
        // Dashboard
        Route::prefix('home')->group(function () {
            Route::get('/', [HomeController::class, 'index'])->name('dashboard.index');
        });
        // Information
        Route::prefix('profile')->group(function () {
            Route::get('/', [ProfileController::class, 'index'])->name('information.index');
            Route::post('/', [ProfileController::class, 'update'])->name('information.update');
        });
        // Card
        Route::prefix('payment')->group(function () {
            Route::prefix('phone-card')->group(function () {
                Route::get('/', function () {
                    return view('management.pages.recharge.phoneCard.index');
                })->name('phoneCard.index');
                Route::post('/', [RechargeCardController::class, 'store'])->name('phoneCard.store');
            });
            // Atm
            Route::prefix('atm')->group(function () {
                Route::get('/', [BankATMController::class, 'index'])->name('bank.atm.index');
            });
            // paypal
            Route::prefix('paypal')->group(function () {
                Route::get('/', function () {
                    return view('management.pages.recharge.paypal.index');
                })->name('paypal.index');
            });
        });
        // report
        Route::prefix('report')->group(function () {
            Route::get('/', [ReportController::class, 'index'])->name('report.index');
        });

        // Services
        Route::prefix('service')->group(function () {
            Route::get('facebook/{type}', [FacebookController::class, 'index'])->name('service.facebook.type');
            Route::get('instagram/{type}', [InstagramController::class, 'index'])->name('service.instagram.type');
        });

        Route::prefix('ajax-manage')->group(function () {
            Route::prefix('payment')->group(function () {
                Route::get('recharge-card-history', [RechargeCardController::class, 'ajaxGetRechargeCardHistory'])->name('ajax.rechargeCardHistory.list');
                Route::get('bank-history', [BankATMController::class, 'ajaxGetBankHistory'])->name('ajax.ajaxGetBankHistory.list');
            });
        });
        Route::prefix('ajax')->group(function () {
            Route::get('logs', [HistoryController::class, 'ajaxGetLogs'])->name('admin.ajax.logs');
            Route::get('log_report', [HistoryController::class, 'ajaxGetLogReport'])->name('admin.ajax.log_report');
        });
        Route::post('new_update', [HomeController::class, 'newUpdate'])->name('home.new-update');
    });
    // Admin manager
    Route::group(['prefix' => 'qladmin', 'middleware' => ['role:' . Role::ROLE_ADMIN]], function () {
        // Dashboard
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
            Route::match(['get', 'post'],'/', [NotificationController::class, 'notifications'])->name('admin.notification.index');
            Route::post('show_last_notify', [NotificationController::class, 'showLastNotify'])->name('admin.notification.show_last_notify');
            Route::post('toggle', [NotificationController::class, 'toggle'])->name('admin.notification.toggle');
            Route::post('notify_new_user', [NotificationController::class, 'notifyNewUser'])->name('admin.notification.notify_new_user');
            Route::post('show', [NotificationController::class, 'show'])->name('admin.notification.show');
            Route::post('delete', [NotificationController::class, 'destroy'])->name('admin.notification.destroy');
        });
        // Payment
        Route::prefix('payment')->group(function () {
            Route::get('/', [PaymentController::class, 'index'])->name('admin.payment.index');
            Route::post('find_repeated', [PaymentController::class, 'findRepeatedPayments'])->name('admin.payment.find_repeated');
            Route::post('find_duplicate', [PaymentController::class, 'findDuplicatePayments'])->name('admin.payment.find_duplicate');
        });

        // Discount codes
        Route::prefix('discount_codes')->group(function () {
            Route::get('/', [DiscountController::class, 'index'])->name('admin.discount.index');
            Route::post('store', [DiscountController::class, 'store'])->name('admin.discount.store');
            Route::post('show', [DiscountController::class, 'show'])->name('admin.discount.show');
            Route::post('delete', [DiscountController::class, 'destroy'])->name('admin.discount.delete');
        });

        // Home Settings
        Route::name('admin.home_settings.')->group(function () {
            Route::get('home_settings', [HomeSettingController::class, 'index'])->name('index');
            Route::prefix('contacts')->group(function () {
                Route::post('/', [ContactController::class, 'store'])->name('contact.index');
                Route::post('show', [ContactController::class, 'show'])->name('contact.show');
                Route::post('delete', [ContactController::class, 'destroy'])->name('contact.delete');
            });
            Route::prefix('questions')->group(function () {
                Route::post('/', [QuestionController::class, 'store'])->name('question.index');
                Route::post('show', [QuestionController::class, 'show'])->name('question.show');
                Route::post('delete', [QuestionController::class, 'destroy'])->name('question.delete');
            });
        });

        // Settings
        Route::prefix('settings')->group(function () {
            Route::get('/', [SettingController::class, 'index'])->name('admin.setting.index');
            Route::post('update', [SettingController::class, 'update'])->name('admin.setting.update');
        });

        // Services
        Route::prefix('services')->group(function () {
            Route::get('{type}', [ServiceController::class, 'index'])->name('admin.service.index');
            Route::post('{type}/store', [ServicePackController::class, 'store'])->name('admin.service.store');
            Route::post('update', [SettingController::class, 'update'])->name('admin.service.update');
            Route::post('show', [SettingController::class, 'show'])->name('admin.service.show');
            Route::post('delete', [SettingController::class, 'destroy'])->name('admin.service.delete');
        });

        // Banks
        Route::prefix('banks')->group(function () {
            Route::get('/', [AdminBankController::class, 'index'])->name('admin.bank.index');
            Route::post('store', [AdminBankController::class, 'store'])->name('admin.bank.store');
            Route::post('show', [AdminBankController::class, 'show'])->name('admin.bank.show');
            Route::post('update', [AdminBankController::class, 'update'])->name('admin.bank.update');
            Route::post('delete', [AdminBankController::class, 'destroy'])->name('admin.bank.delete');
        });

        // Price Service
        Route::prefix('prices')->group(function () {
            Route::get('/', [PriceServiceController::class, 'index'])->name('admin.price.service.index');
        });

        // Order Manage Buff
         Route::prefix('logs')->group(function () {
            Route::get('/', [OrderController::class, 'buff'])->name('admin.orders.buff');
        });

        // Ajax
        Route::prefix('ajax')->group(function () {
            Route::prefix('users')->group(function () {
                Route::get('/', [UserController::class, 'ajaxGetUsers'])->name('admin.ajax.user.list');
            });
            Route::prefix('notifications')->group(function () {
                Route::get('/', [NotificationController::class, 'ajaxGetNotifications'])->name('admin.ajax.notification.list');
            });
            Route::prefix('payments')->group(function () {
                Route::get('/', [PaymentController::class, 'ajaxGetPayments'])->name('admin.ajax.get_payments');
            });
            Route::get('discount_codes', [DiscountController::class, 'ajaxGetDiscounts'])->name('admin.ajax.discount_codes');
            Route::get('contacts', [ContactController::class, 'ajaxGetContacts'])->name('admin.ajax.contacts');
            Route::get('questions', [QuestionController::class, 'ajaxGetQuestions'])->name('admin.ajax.questions');
            Route::get('services/{type}', [ServiceController::class, 'ajaxGetServices'])->name('admin.ajax.services');
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
