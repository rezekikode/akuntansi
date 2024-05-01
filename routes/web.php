<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    
    // Profile
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\ProfileController::class, 'destroy'])->name('profile.destroy');

    // Jenis Akun
    Route::resource('jenis-akun', App\Http\Controllers\JenisAkunController::class);
    
    // Akun
    Route::resource('akun', App\Http\Controllers\AkunController::class);
    Route::patch('/akun/{id}/restore/ajax', [App\Http\Controllers\AkunController::class, 'restoreAjax'])->name('akun.restore.ajax');
    
    // Akun Saldo Awal
    Route::resource('akun.saldo-awal-akun', App\Http\Controllers\AkunSaldoAwalController::class);
    
    // Jurnal
    Route::resource('jurnal', App\Http\Controllers\JurnalController::class);
    Route::patch('/jurnal/{jurnal}/posting', [App\Http\Controllers\JurnalController::class, 'posting'])->name('jurnal.posting');
    Route::patch('/jurnal/{id}/posting/ajax', [App\Http\Controllers\JurnalController::class, 'postingAjax'])->name('jurnal.posting.ajax');
    Route::patch('/jurnal/{id}/restore/ajax', [App\Http\Controllers\JurnalController::class, 'restoreAjax'])->name('jurnal.restore.ajax');
    
    // Jurnal Detail
    Route::resource('jurnal-detail', App\Http\Controllers\JurnalDetailController::class);
    
    // Laporan Buku Besar
    Route::resource('laporan/buku-besar', App\Http\Controllers\LaporanBukuBesarController::class)
        ->parameters([
            'buku-besar' => 'akun'
        ])
        ->only([
            'index',
            'show'
        ])
        ->names([
            'index' => 'laporan.buku-besar.index',
            'show' => 'laporan.buku-besar.show'
        ]);

    // Laporan Neraca
    Route::resource('laporan/neraca-saldo', App\Http\Controllers\LaporanNeracaSaldoController::class)
        ->only([
            'index'
        ])
        ->names([
            'index' => 'laporan.neraca-saldo.index'
        ]);

});

require __DIR__.'/auth.php';
