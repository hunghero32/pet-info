<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LockedAccountController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware('auth')->prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');
        Route::put('/', [ProfileController::class, 'update'])->name('update');
        Route::put('/password', [ProfileController::class, 'updatePassword'])->name('password.update');
        Route::get('/devices', [ProfileController::class, 'recentDevices'])->name('devices');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy');
    });

});
require __DIR__ . '/auth.php';

Route::get('/account/locked', [LockedAccountController::class, 'show'])
    ->middleware(['auth'])
    ->name('account.locked');

