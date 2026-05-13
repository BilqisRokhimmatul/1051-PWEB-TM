<x-app-layout>
    <div style="padding: 50px 10%; background: #FDF5E6; min-height: 80vh;">
        <div style="max-width: 900px; margin: 0 auto; background: white; border-radius: 30px; overflow: hidden; box-shadow: 0 15px 35px rgba(0,0,0,0.05); display: flex;">
            
            {{-- Bagian Kiri: Foto Lapangan --}}
            <div style="flex: 1; background: #eee; min-height: 400px; display: flex; align-items: center; justify-content: center;">
                @if($lapangan->foto_lapangan)
                    <img src="{{ asset('images/' . $lapangan->foto_lapangan) }}" alt="{{ $lapangan->nama_lapangan }}" style="width: 100%; height: 100%; object-fit: cover;">
                @else
                    <div style="text-align: center; color: #bbb;">
                        <span style="font-size: 50px;">🏟️</span>
                        <p>Tidak ada foto</p>
                    </div>
                @endif
            </div>

            {{-- Bagian Kanan: Detail Informasi --}}
            <div style="flex: 1.2; padding: 40px;">
                <div style="display: flex; justify-content: space-between; align-items: flex-start;">
                    <div>
                        <span style="background: maroon; color: white; padding: 5px 12px; border-radius: 20px; font-size: 12px; font-weight: bold; text-transform: uppercase;">
                            {{ $lapangan->kategori }}
                        </span>
                        <h1 style="color: #333; font-size: 2rem; font-weight: 800; margin-top: 10px;">{{ $lapangan->nama_lapangan }}</h1>
                    </div>
                    <p style="color: maroon; font-weight: bold; font-size: 1.2rem;">ID: {{ $lapangan->kode_lapangan }}</p>
                </div>

                <hr style="border: 0; border-top: 1px solid #eee; margin: 25px 0;">

                <div style="margin-bottom: 30px;">
                    <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
                        <span style="color: #777;">Harga Sewa:</span>
                        <span style="color: #333; font-weight: bold; font-size: 1.1rem;">Rp {{ number_format($lapangan->harga_per_jam) }} / Jam</span>
                    </div>
                    <div style="display: flex; justify-content: space-between; margin-bottom: 15px;">
                        <span style="color: #777;">Email Kontak:</span>
                        <span style="color: #333; font-weight: bold;">{{ $lapangan->email_kontak }}</span>
                    </div>
                    <div style="display: flex; justify-content: space-between;">
                        <span style="color: #777;">Status:</span>
                        <span style="padding: 4px 12px; border-radius: 8px; font-size: 12px; font-weight: bold; {{ $lapangan->is_available ? 'background: #d4edda; color: #155724;' : 'background: #f8d7da; color: #721c24;' }}">
                            {{ $lapangan->is_available ? 'TERSEDIA' : 'PENUH' }}
                        </span>
                    </div>
                </div>

                <div style="display: flex; gap: 10px; margin-top: 40px;">
                    <a href="{{ route('lapangan.index') }}" style="flex: 1; text-align: center; background: #f0f0f0; color: #555; padding: 12px; border-radius: 12px; text-decoration: none; font-weight: bold;">
                        Kembali
                    </a>
                    <a href="{{ route('lapangan.edit', $lapangan->id) }}" style="flex: 1; text-align: center; background: maroon; color: white; padding: 12px; border-radius: 12px; text-decoration: none; font-weight: bold;">
                        Edit Data
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>