@extends('layouts.app')

@section('content')
<div style="padding: 30px 20%;">
    <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
        <h2 style="color: maroon; margin-bottom: 20px;">Tambah Lapangan Baru</h2>
        
        <form action="{{ route('lapangan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div style="margin-bottom: 15px;">
                <label>Kode Lapangan</label>
                <input type="text" name="kode_lapangan" value="{{ old('kode_lapangan') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                @error('kode_lapangan') <small style="color: red;">{{ $message }}</small> @enderror
            </div>

            <div style="margin-bottom: 15px;">
                <label>Nama Lapangan</label>
                <input type="text" name="nama_lapangan" value="{{ old('nama_lapangan') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Kategori</label>
                <select name="kategori" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    <option value="Futsal">Futsal</option>
                    <option value="Badminton">Badminton</option>
                    <option value="Basket">Basket</option>
                </select>
            </div>

            <div style="margin-bottom: 15px;">
                <label>Harga per Jam</label>
                <input type="number" name="harga_per_jam" value="{{ old('harga_per_jam') }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
            </div>

            <div style="margin-bottom: 15px;">
                <label>Foto Lapangan</label>
                <input type="file" name="foto" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                @error('foto') <small style="color: red;">{{ $message }}</small> @enderror
            </div>
            
            <button type="submit" style="background: maroon; color: white; padding: 12px 20px; border: none; border-radius: 8px; width: 100%; cursor: pointer;">Simpan Lapangan</button>
            <a href="{{ route('lapangan.index') }}" style="display: block; text-align: center; margin-top: 15px; color: #666; text-decoration: none;">Kembali</a>
        </form>
    </div>
</div>
@endsection