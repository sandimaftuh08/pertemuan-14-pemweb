<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\TransaksiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('buku', BukuController::class);

Route::get('/anggota/search', [AnggotaController::class, 'search'])
    ->name('anggota.search');

Route::get('/anggota/export', [AnggotaController::class, 'export'])
    ->name('anggota.export');

Route::resource('anggota', AnggotaController::class);

    // route custom HARUS di atas resource('transaksi')
    Route::get('/transaksi/laporan', [TransaksiController::class, 'laporan'])->name('transaksi.laporan');
    Route::get('/transaksi/laporan/export', [TransaksiController::class, 'exportPdf'])->name('transaksi.laporan.export');
    Route::put('/transaksi/{id}/kembalikan', [TransaksiController::class, 'kembalikan'])->name('transaksi.kembalikan');

    Route::resource('transaksi', TransaksiController::class)->only(['index', 'create', 'store', 'show']);
});

require __DIR__.'/auth.php';