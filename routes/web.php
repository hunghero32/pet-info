<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LockedAccountController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\PetPdfController;

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
    Route::middleware(['auth'])->prefix('pet')->group(function () {
    Route::resource('pets', PetController::class);
    Route::post('pets/{pet}/report-lost', [PetController::class, 'reportLost'])->name('reportLost');
});

});
require __DIR__ . '/auth.php';

Route::get('/account/locked', [LockedAccountController::class, 'show'])
    ->middleware(['auth'])
    ->name('account.locked');

// Hồ sơ công khai + QR
Route::get('/pets/{public_id}', [PetController::class, 'publicProfile'])->name('pets.public');
Route::get('/pets/{public_id}/qr', [PetController::class, 'downloadQr'])->name('pets.qr');
Route::get('/pets/{pet}/pdf', [PetPdfController::class, 'export'])->name('pets.pdf');
// Báo thất lạc
Route::patch('/pets/{pet}/lost', [PetController::class, 'reportLost'])->name('pets.reportLost');