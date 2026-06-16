<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapangan;
use Illuminate\Support\Facades\Session;

class WelcomeController extends Controller
{
    public function index()
    {
        // 1. Ambil semua data lapangan terbaru dari database
        $lapangans = Lapangan::all(); 

        // 2. LOGIKA SESSION: Hitung jumlah total kunjungan
        $jumlahKunjungan = Session::get('jumlah_kunjungan', 0) + 1;
        Session::put('jumlah_kunjungan', $jumlahKunjungan);

        // 3. LOGIKA SESSION: Catat kunjungan pertama
        if (!Session::has('kunjungan_pertama')) {
            Session::put('kunjungan_pertama', now()->format('d M Y, H:i:s'));
        }

        // 4. LOGIKA SESSION: Perbarui kunjungan terakhir
        Session::put('kunjungan_terakhir', now()->format('d M Y, H:i:s'));

        // 5. Lempar semua variabel ke welcome.blade.php
        return view('welcome', compact('lapangans', 'jumlahKunjungan'));
    }
}