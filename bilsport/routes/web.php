<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LapanganController; 
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', function () {
        $stats = [
            ['judul' => 'Total Lapangan', 'nilai' => '5', 'ikon' => '🏟️', 'warna' => 'maroon'],
            ['judul' => 'Booking Hari Ini', 'nilai' => '12', 'ikon' => '📅', 'warna' => 'gold'],
            ['judul' => 'User Aktif', 'nilai' => '150', 'ikon' => '👤', 'warna' => 'darkred'],
        ];

        $lapangans = \App\Models\Lapangan::all(); 

        return view('dashboard', compact('stats', 'lapangans'));
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::resource('lapangan', LapanganController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/about', function () {
    return view('about');
    });

    Route::get('/contact', function () {
        return view('contact');
    });
});

require __DIR__.'/auth.php';