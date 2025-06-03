<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\TicketTypeController;
use App\Http\Controllers\Admin\TransportController;
use App\Http\Controllers\Admin\TransportTypeController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // User routes
    Route::resource('cards', CardController::class);
    Route::resource('transactions', TransactionController::class)->only(['index', 'store']);
});

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('cities', CityController::class);
        Route::resource('transport-types', TransportTypeController::class);
        Route::resource('transports', TransportController::class);
        Route::resource('ticket-types', TicketTypeController::class);
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
