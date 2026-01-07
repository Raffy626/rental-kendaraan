<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\RentalController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'pelanggan') {
            $kendaraan = App\Models\Kendaraan::where('status', 'available')->get();
            return view('pelanggan.dashboard', compact('kendaraan'));
        }
        return view('dashboard');
    })->name('dashboard');
    Route::middleware(['role:admin,petugas'])->group(function () {
        Route::resource('kendaraan', KendaraanController::class)->except(['index', 'show']);
    });

    Route::resource('kendaraan', KendaraanController::class)->only(['index', 'show']);
});

Route::middleware(['auth', 'role:pelanggan'])->group(function () {
    Route::post('/rental/{kendaraan}', [RentalController::class, 'store'])
        ->name('rental.store');
});

Route::middleware(['auth', 'role:admin,petugas'])->group(function () {
    Route::get('/rental', [RentalController::class, 'index'])
        ->name('rental.index');
    Route::put('/rental/{rental}/return', [PengembalianController::class, 'return'])
        ->name('rental.return');
});

require __DIR__ . '/auth.php';
