<x-app-layout>
    <div style="padding: 50px 10%; background: #FDF5E6; min-height: 80vh;">
        <div style="max-width: 800px; margin: 0 auto; background: white; padding: 40px; border-radius: 25px; box-shadow: 0 15px 35px rgba(0,0,0,0.05);">
            
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; border-bottom: 2px solid #f0f0f0; padding-bottom: 15px;">
                <h2 style="color: maroon; font-weight: bold; margin: 0;">Tambah Lapangan Baru</h2>
                <a href="{{ route('lapangan.index') }}" style="color: #666; text-decoration: none; font-size: 14px;">← Kembali</a>
            </div>

            {{-- Form dengan Enctype untuk Upload Foto --}}
            <form action="{{ route('lapangan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #444;">Kode Lapangan</label>
                        <input type="text" name="kode_lapangan" value="{{ old('kode_lapangan') }}" placeholder="Contoh: LKR-F01" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 10px; outline: none;" required>
                        @error('kode_lapangan') <small style="color: red;">{{ $message }}</small> @enderror
                    </div>
                    <div>
                        <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #444;">Nama Lapangan</label>
                        <input type="text" name="nama_lapangan" value="{{ old('nama_lapangan') }}" placeholder="Nama lapangan" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 10px; outline: none;" required>
                    </div>
                </div>

                <div style="margin-bottom: 20px;">
                    <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #444;">Email Kontak</label>
                    <input type="email" name="email_kontak" value="{{ old('email_kontak') }}" placeholder="email@bilsport.com" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 10px; outline: none;" required>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div>
                        <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #444;">Kategori</label>
                        <select name="kategori" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 10px; outline: none; background: white;" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Futsal">Futsal</option>
                            <option value="Badminton">Badminton</option>
                            <option value="Basket">Basket</option>
                        </select>
                    </div>
                    <div>
                        <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #444;">Harga per Jam</label>
                        <input type="number" name="harga_per_jam" value="{{ old('harga_per_jam') }}" placeholder="Contoh: 150000" style="width: 100%; padding: 12px; border: 1px solid #ddd; border-radius: 10px; outline: none;" required>
                    </div>
                </div>

                <div style="margin-bottom: 30px;">
                    <label style="display: block; font-weight: bold; margin-bottom: 8px; color: #444;">Foto Lapangan</label>
                    <input type="file" name="foto" style="width: 100%; padding: 10px; border: 1px dashed maroon; border-radius: 10px; background: #fff5f5;">
                    <small style="color: #888;">Format: JPG, PNG (Maks 2MB)</small>
                </div>

                <button type="submit" style="width: 100%; background: maroon; color: white; border: none; padding: 15px; border-radius: 12px; font-weight: bold; font-size: 1rem; cursor: pointer; transition: 0.3s; box-shadow: 0 5px 15px rgba(128,0,0,0.2);">
                    🚀 Simpan Data Lapangan
                </button>
            </form>

        </div>
    </div>
</x-app-layout>