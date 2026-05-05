<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            ['judul' => 'Total Item', 'nilai' => '15', 'ikon' => '📦', 'warna' => 'maroon'],
            ['judul' => 'Total Nilai Inventaris', 'nilai' => 'Rp 2.500.000', 'ikon' => '💰', 'warna' => 'green'],
            ['judul' => 'Stok Menipis', 'nilai' => '3', 'ikon' => '⚠️', 'warna' => 'orange'],
        ];

        $lapangans = [
            ['kode' => 'L001', 'kat' => 'Futsal', 'nama' => 'Galaxy Futsal', 'lok' => 'Gedung A', 'harga' => '150.000', 'tgl' => '2024-05-01'],
            ['kode' => 'L002', 'kat' => 'Badminton', 'nama' => 'PB Smash', 'lok' => 'Gedung B', 'harga' => '50.000', 'tgl' => '2024-05-02'],
        ];

        session()->flash('success', 'Selamat anda masuk ke bilsport');

        return view('dashboard', compact('stats', 'lapangans'));
    }
}