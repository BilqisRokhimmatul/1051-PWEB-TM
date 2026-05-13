@extends('layouts.app')

@section('content')
<div style="padding: 30px 20%;">
    <div style="background: white; padding: 30px; border-radius: 15px; box-shadow: 0 5px 15px rgba(0,0,0,0.1);">
        <h2 style="color: maroon; margin-bottom: 20px;">Edit Lapangan: {{ $lapangan->nama_lapangan }}</h2>
        
        <form action="{{ route('lapangan.update', $lapangan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div style="margin-bottom: 15px;">
                <label>Kode Lapangan</label>
                <input type="text" name="kode_lapangan" value="{{ old('kode_lapangan', $lapangan->kode_lapangan) }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                @error('kode_lapangan') <small style="color: red;">{{ $message }}</small> @enderror
            </div>

            <div style="margin-bottom: 15px;">
                <label>Nama Lapangan</label>
                <input type="text" name="nama_lapangan" value="{{ old('nama_lapangan', $lapangan->nama_lapangan) }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                @error('nama_lapangan') <small style="color: red;">{{ $message }}</small> @enderror
            </div>

            <div style="margin-bottom: 15px;">
                <label>Kategori</label>
                <select name="kategori" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                    <option value="Futsal" {{ old('kategori', $lapangan->kategori) == 'Futsal' ? 'selected' : '' }}>Futsal</option>
                    <option value="Badminton" {{ old('kategori', $lapangan->kategori) == 'Badminton' ? 'selected' : '' }}>Badminton</option>
                    <option value="Basket" {{ old('kategori', $lapangan->kategori) == 'Basket' ? 'selected' : '' }}>Basket</option>
                </select>
                @error('kategori') <small style="color: red;">{{ $message }}</small> @enderror
            </div>

            <div style="margin-bottom: 15px;">
                <label>Harga per Jam</label>
                <input type="number" name="harga_per_jam" value="{{ old('harga_per_jam', $lapangan->harga_per_jam) }}" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                @error('harga_per_jam') <small style="color: red;">{{ $message }}</small> @enderror
            </div>

            <button type="submit" style="background: orange; color: white; padding: 12px 20px; border: none; border-radius: 8px; width: 100%; cursor: pointer;">Update Data</button>
            <a href="{{ route('lapangan.index') }}" style="display: block; text-align: center; margin-top: 15px; color: #666; text-decoration: none;">Batal</a>
        </form>
    </div>
</div>
@endsection