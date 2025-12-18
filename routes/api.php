<?php

use App\Http\Controllers\bff\HomeController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CustomerTTHController;
use App\Http\Controllers\CustomerTTHDetailController;
use App\Http\Controllers\MobileConfigController;
use Illuminate\Support\Facades\Route;

Route::get('/ping', function () {
    return response()->json([
        'message' => 'pong',
    ]);
});

Route::prefix('customers')->group(function () {
    Route::get('/', [CustomerController::class, 'index']);
    Route::get('/{custId}', [CustomerController::class, 'show']);
});

Route::prefix('customer-tth')->group(function () {
    Route::get('/', [CustomerTTHController::class, 'index']);
    Route::get('/{id}', [CustomerTTHController::class, 'show']);
    Route::get('/by-customer/{custId}', [CustomerTTHController::class, 'byCustomer']);
});

Route::prefix('customer-tth-detail')->group(function () {
    Route::get('/', [CustomerTTHDetailController::class, 'index']);
    Route::get('/{id}', [CustomerTTHDetailController::class, 'show']);
    Route::get('/by-tth/{tthNo}', [CustomerTTHDetailController::class, 'byTTH']);
});

Route::prefix('mobile-config')->group(function () {
    Route::get('/', [MobileConfigController::class, 'index']);
    Route::get('/{id}', [MobileConfigController::class, 'show']);
    Route::get('/by-branch/{branchCode}', [MobileConfigController::class, 'byBranch']);
    Route::get('/by-name/{name}', [MobileConfigController::class, 'byName']);

});

Route::prefix('bff')->group(function () {
    Route::get('/home', [HomeController::class, 'index']);
});
