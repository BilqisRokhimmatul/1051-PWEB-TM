@extends('layouts.app')

@section('content')
<div style="padding: 30px 20%;">
    <div style="background: white; padding: 40px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
        <h2 style="color: maroon; border-bottom: 2px solid maroon; padding-bottom: 10px;">Detail Lapangan</h2>
        <div style="margin-top: 20px; line-height: 2;">
            <p><strong>Kode:</strong> {{ $lapangan->kode_lapangan }}</p>
            <p><strong>Nama:</strong> {{ $lapangan->nama_lapangan }}</p>
            <p><strong>Kategori:</strong> {{ $lapangan->kategori }}</p>
            <p><strong>Harga:</strong> Rp {{ number_format($lapangan->harga_per_jam) }}</p>
            <p><strong>Status:</strong> {{ $lapangan->is_available ? 'Tersedia' : 'Penuh' }}</p>
        </div>
        <a href="{{ route('lapangan.index') }}" style="display: inline-block; margin-top: 20px; color: maroon;">← Kembali ke Daftar</a>
    </div>
</div>
@endsection