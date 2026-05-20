<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LapanganController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('lapangan', LapanganController::class);

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        $stats = [
            ['judul' => 'Total Lapangan', 'nilai' => '5', 'ikon' => '🏟️', 'warna' => 'maroon'],
            ['judul' => 'Booking Hari Ini', 'nilai' => '12', 'ikon' => '📅', 'warna' => 'gold'],
            ['judul' => 'User Aktif', 'nilai' => '150', 'ikon' => '👤', 'warna' => 'darkred'],
        ];

        $lapangans = \App\Models\Lapangan::where('user_id', auth()->id())->get(); 

        return view('dashboard', compact('stats', 'lapangans'));
    })->name('dashboard');

    Route::get('/lapangan/search', [LapanganController::class, 'search'])->name('lapangan.search');

    Route::middleware(['admin'])->group(function () {
        Route::resource('lapangan', LapanganController::class);
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/about', function () { return view('about'); })->name('about');
    Route::get('/contact', function () { return view('contact'); })->name('contact');


    Route::get('/pengaturan', [\App\Http\Controllers\LapanganController::class, 'updateKunjungan'])->name('pengaturan');
    Route::post('/pengaturan/reset-kunjungan', [\App\Http\Controllers\LapanganController::class, 'resetKunjungan'])->name('reset.kunjungan');

    Route::post('/api/save-preferences', [\App\Http\Controllers\LapanganController::class, 'savePreferences']);
    
});

require __DIR__.'/auth.php';