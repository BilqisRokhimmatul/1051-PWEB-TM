<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapangan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Ambil data dasar yang dibutuhkan
        $totalItem = Lapangan::count();
        $lapangans = Lapangan::latest()->get();

        // 2. Cek Role User yang sedang login
        if (Auth::user()->role === 'admin') {
            
            // Statistik Khusus Admin (Bawaan awal kamu)
            $stats = [
                ['judul' => 'Total Lapangan', 'nilai' => $totalItem, 'ikon' => '📦', 'warna' => 'maroon'],
                ['judul' => 'Kategori Tersedia', 'nilai' => '4', 'ikon' => '🏟️', 'warna' => 'green'],
                ['judul' => 'Status Aktif', 'nilai' => 'Ready', 'ikon' => '✅', 'warna' => 'orange'],
            ];

            // Kembalikan ke view admin yang lama
            return view('dashboard', compact('stats', 'lapangans'));
            
        } else {
            
            // Kembalikan ke view pelanggan baru yang super cantik tanpa grafik laporan
            return view('dashboard-pelanggan', compact('lapangans'));
            
        }
    }
}