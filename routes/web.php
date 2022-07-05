<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CoffeeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\API\MidtransController;

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

// Homepage
Route::get('/', function () {
    return redirect()->route('redirects');
});

Route::get('redirects', [HomeController::class, 'index'])->name('redirects');

// User
Route::middleware(['auth:sanctum', 'verified'])
    ->group(function () {
        Route::get('/success', function () {
            return view('auth.success');
        })->name('success');
    });

// Admin
Route::prefix('admin')
    ->middleware(['auth:sanctum', 'admin', 'verified'])
    ->group(function() {
        Route::get('/', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('coffees', CoffeeController::class);
        Route::resource('users', UserController::class);

        Route::get('transactions/{id}/status/{status}', [TransactionController::class, 'changeStatus'])
            ->name('transactions.changeStatus');
        Route::resource('transactions', TransactionController::class);
    });

// Midtrans Related
Route::get('midtrans/success', [MidtransController::class, 'success']);
Route::get('midtrans/unfinish', [MidtransController::class, 'unfinish']);
Route::get('midtrans/error', [MidtransController::class, 'error']);
