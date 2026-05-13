<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalItem = \App\Models\Lapangan::count();
        $lapangans = \App\Models\Lapangan::latest()->take(10)->get(); 

        $stats = [
            ['judul' => 'Total Lapangan', 'nilai' => $totalItem, 'ikon' => '📦', 'warna' => 'maroon'],
            ['judul' => 'Kategori Tersedia', 'nilai' => '4', 'ikon' => '🏟️', 'warna' => 'green'],
            ['judul' => 'Status Aktif', 'nilai' => 'Ready', 'ikon' => '✅', 'warna' => 'orange'],
        ];

        return view('dashboard', compact('stats', 'lapangans'));
    }
}