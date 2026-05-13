<x-app-layout>
    <div style="padding: 50px 10%; background: #FDF5E6; min-height: 80vh;">
        <div style="max-width: 700px; margin: 0 auto; background: white; padding: 40px; border-radius: 25px; box-shadow: 0 15px 35px rgba(0,0,0,0.05);">
            
            <div style="border-bottom: 2px solid #f0f0f0; padding-bottom: 15px; margin-bottom: 25px;">
                <h2 style="color: maroon; font-weight: bold; margin: 0;">Edit Lapangan: <span style="color: #333;">{{ $lapangan->nama_lapangan }}</span></h2>
                <p style="color: #888; font-size: 14px; margin-top: 5px;">Pastikan semua data sudah benar sebelum disimpan kembali.</p>
            </div>
            
            <form action="{{ route('lapangan.update', $lapangan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #444;">Kode Lapangan</label>
                        <input type="text" name="kode_lapangan" value="{{ old('kode_lapangan', $lapangan->kode_lapangan) }}" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 10px; outline: none; focus: border-color: maroon;">
                        @error('kode_lapangan') <small style="color: red;">{{ $message }}</small> @enderror
                    </div>
                    <div>
                        <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #444;">Nama Lapangan</label>
                        <input type="text" name="nama_lapangan" value="{{ old('nama_lapangan', $lapangan->nama_lapangan) }}" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 10px; outline: none;">
                        @error('nama_lapangan') <small style="color: red;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #444;">Kategori</label>
                        <select name="kategori" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 10px; outline: none; background: white;">
                            <option value="Futsal" {{ old('kategori', $lapangan->kategori) == 'Futsal' ? 'selected' : '' }}>Futsal</option>
                            <option value="Badminton" {{ old('kategori', $lapangan->kategori) == 'Badminton' ? 'selected' : '' }}>Badminton</option>
                            <option value="Basket" {{ old('kategori', $lapangan->kategori) == 'Basket' ? 'selected' : '' }}>Basket</option>
                        </select>
                        @error('kategori') <small style="color: red;">{{ $message }}</small> @enderror
                    </div>
                    <div>
                        <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #444;">Harga per Jam</label>
                        <input type="number" name="harga_per_jam" value="{{ old('harga_per_jam', $lapangan->harga_per_jam) }}" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 10px; outline: none;">
                        @error('harga_per_jam') <small style="color: red;">{{ $message }}</small> @enderror
                    </div>
                </div>

                <div style="margin-top: 30px; display: flex; gap: 15px;">
                    <button type="submit" style="flex: 2; background: maroon; color: white; padding: 15px; border: none; border-radius: 12px; font-weight: bold; cursor: pointer; transition: 0.3s; box-shadow: 0 4px 15px rgba(128,0,0,0.2);">
                        Update Data Lapangan
                    </button>
                    <a href="{{ route('lapangan.index') }}" style="flex: 1; text-align: center; background: #eee; color: #555; padding: 15px; border-radius: 12px; text-decoration: none; font-weight: bold; transition: 0.3s;">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>