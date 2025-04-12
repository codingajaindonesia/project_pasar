<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseDetailController;
use App\Http\Controllers\ExpenseTransactionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IncomeDetailController;
use App\Http\Controllers\IncomeTransactionController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);

Route::get('login', function(){
    return view('auth/login');
})->name('login');
Route::prefix('auth')->group(function () {
    //Mengatur untuk route atau peralihan page login dan logout akun
    Route::post('login', [AuthController::class, 'verify']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('forget-password', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('forget-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    
    Route::get('/reset-password/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [AuthController::class, 'reset'])->name('password.update');
});

//middleware untuk menandakan jalur tersebut mewajibkan untuk login terlebih dahulu
Route::group(['middleware' => 'auth'], function () {
    Route::resource('/profile', ProfileController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/locations', LocationController::class);
    Route::resource('/tenants', TenantController::class);
    
    Route::resource('transactions-income/{id}/detail', IncomeDetailController::class);
    Route::resource('transactions-income', IncomeTransactionController::class);

    Route::resource('transactions-expense/{id}/detail', ExpenseDetailController::class)->names('detail-expense');
    Route::resource('transactions-expense', ExpenseTransactionController::class);

    Route::prefix('report')->group(function () {
        Route::get('income', [ReportController::class, 'income'])->name('report-income');
        Route::get('expense', [ReportController::class, 'expense'])->name('report-expense');
        Route::get('all', [ReportController::class, 'all'])->name('report-all');
    });

});