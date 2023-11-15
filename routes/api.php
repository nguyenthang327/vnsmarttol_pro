<?php

use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Client\ToolController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('tools/get_uid', [ToolController::class, 'getUID']);
Route::prefix('service')->group(function() {
    Route::post('facebook/{type}', [ApiController::class, 'index'])->name('api.service.facebook');
});
