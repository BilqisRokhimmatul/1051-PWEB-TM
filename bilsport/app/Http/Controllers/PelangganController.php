<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapangan; // <-- Pastikan ini memanggil Model Lapangan kamu
use Illuminate\Support\Facades\Auth;

class PelangganController extends Controller
{
    public function index()
    {
        // 1. Ambil semua data lapangan terbaru yang di-update admin dari database
        $lapangans = Lapangan::all();

        // 2. Kirim data tersebut ke file blade pelanggan kamu (misal namanya 'dashboard')
        return view('dashboard', compact('lapangans'));
    }
}