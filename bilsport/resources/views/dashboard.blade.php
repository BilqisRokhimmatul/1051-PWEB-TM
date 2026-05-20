<x-app-layout>
    <section style="background: linear-gradient(135deg, #800000 0%, #4a0000 100%); color: white; padding: 60px 20px; text-align: center; border-radius: 0 0 50px 50px; margin-bottom: 40px;">
        <h1 style="font-size: 2.5rem; font-weight: 800; margin-bottom: 15px;">Selamat Datang di Sistem Booking Lapangan Jember</h1>
        <p style="font-size: 1.1rem; opacity: 0.9;">Solusi mudah, cepat, dan online untuk reservasi lapangan futsal, badminton, dan basket di Kota Jember.</p>
    </section>

    <div style="max-width: 1400px; margin: 0 auto; padding: 0 20px;">
        
        <div style="background: white; padding: 25px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); margin-bottom: 40px; border-left: 5px solid maroon;">
            <h3 style="color: maroon; font-weight: bold; font-size: 1.2rem; margin-bottom: 15px; display: flex; align-items: center; gap: 8px;">
                🌤️ Informasi Cuaca Jember Terkini
            </h3>
            
            <div id="loading-cuaca" style="color: #666; font-style: italic;">
                🔄 Sedang mengambil data cuaca dari satelit, mohon tunggu...
            </div>
            
            <div id="info-cuaca" style="display: none; align-items: center; gap: 40px; flex-wrap: wrap;">
                <div>
                    <p style="color: #888; font-size: 0.85rem; margin-bottom: 2px; text-transform: uppercase; letter-spacing: 1px;">Lokasi Pemantauan</p>
                    <p id="nama-kota" style="font-size: 1.2rem; font-weight: bold; color: #333;"></p>
                </div>
                <div>
                    <p style="color: #888; font-size: 0.85rem; margin-bottom: 2px; text-transform: uppercase; letter-spacing: 1px;">Suhu Saat Ini</p>
                    <p style="font-size: 2rem; font-weight: 800; color: maroon; margin: 0;"><span id="suhu-cuaca"></span>°C</p>
                </div>
                <div>
                    <p style="color: #888; font-size: 0.85rem; margin-bottom: 2px; text-transform: uppercase; letter-spacing: 1px;">Kondisi Langit</p>
                    <p id="kondisi-cuaca" style="font-size: 1.2rem; font-weight: bold; color: #333; text-transform: capitalize;"></p>
                </div>
                <div style="margin-left: auto; font-size: 0.85rem; color: #666; background: #fff5f5; padding: 8px 15px; border-radius: 8px; border: 1px dashed maroon;">
                    📢 *Saran sistem: Pastikan memilih jenis lapangan **Indoor** jika kondisi terpantau hujan.*
                </div>
            </div>
        </div>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px; margin-bottom: 40px;">
            @foreach($stats as $s)
            <div style="background: white; padding: 25px; border-radius: 20px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); text-align: center; border-bottom: 5px solid {{ $s['warna'] }}; transition: 0.3s;">
                <span style="font-size: 2.5rem;">{{ $s['ikon'] }}</span>
                <h4 style="color: #888; font-size: 0.9rem; margin-top: 10px;">{{ $s['judul'] }}</h4>
                <p style="font-size: 1.8rem; font-weight: bold; color: #333;">{{ $s['nilai'] }}</p>
            </div>
            @endforeach
        </div>

        <div style="display: grid; grid-template-columns: 3fr 1fr; gap: 30px; margin-bottom: 50px;">
            
            <div style="background: white; padding: 30px; border-radius: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                    <h3 style="color: maroon; font-weight: bold; font-size: 1.4rem;">Daftar Lengkap Data Lapangan</h3>
                    <a href="{{ route('lapangan.create') }}" style="background: maroon; color: white; padding: 10px 20px; border-radius: 10px; text-decoration: none; font-weight: bold;">+ Tambah Lapangan</a>
                </div>
                
                <div style="overflow-x: auto;">
                    <table style="width: 100%; border-collapse: collapse;">
                        <thead style="background: maroon; color: white;">
                            <tr>
                                <th style="padding: 15px; text-align: left; border-radius: 12px 0 0 0;">NO</th>
                                <th style="padding: 15px; text-align: left;">KODE</th>
                                <th style="padding: 15px; text-align: left;">NAMA LAPANGAN</th>
                                <th style="padding: 15px; text-align: left;">HARGA</th>
                                <th style="padding: 15px; text-align: center; border-radius: 0 12px 0 0;">AKSI</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lapangans as $key => $lp)
                            <tr style="border-bottom: 1px solid #f5f5f5;">
                                <td style="padding: 15px;">{{ $key + 1 }}</td>
                                <td style="padding: 15px; font-weight: bold; color: maroon;">{{ $lp->kode_lapangan }}</td>
                                <td style="padding: 15px;">{{ $lp->nama_lapangan }}</td>
                                <td style="padding: 15px;">Rp {{ number_format($lp->harga_per_jam) }}</td>
                                <td style="padding: 15px; text-align: center;">
                                    <a href="{{ route('lapangan.edit', $lp->id) }}" style="background: #ffc107; color: black; padding: 5px 12px; border-radius: 6px; text-decoration: none; font-size: 0.8rem; font-weight: bold;">Edit</a>
                                    <form action="{{ route('lapangan.destroy', $lp->id) }}" method="POST" style="display:inline;">
                                        @csrf @method('DELETE')
                                        <button style="background: #dc3545; color: white; border: none; padding: 5px 12px; border-radius: 6px; font-size: 0.8rem; cursor: pointer;">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <aside>
                <div style="background: white; padding: 25px; border-radius: 25px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); position: sticky; top: 120px;">
                    <h3 style="color: maroon; font-weight: bold; border-bottom: 2px solid maroon; padding-bottom: 10px; margin-bottom: 20px;">Filter Lapangan</h3>
                    <div style="margin-bottom: 25px;">
                        <p style="font-weight: bold; margin-bottom: 12px; color: #555;">🎾 Kategori Olahraga</p>
                        <label style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px; cursor: pointer;"><input type="checkbox"> Futsal</label>
                        <label style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px; cursor: pointer;"><input type="checkbox"> Badminton</label>
                        <label style="display: flex; align-items: center; gap: 10px; margin-bottom: 8px; cursor: pointer;"><input type="checkbox"> Basket</label>
                    </div>
                    <button style="width: 100%; background: maroon; color: white; border: none; padding: 12px; border-radius: 12px; font-weight: bold; cursor: pointer;">Terapkan Filter</button>
                </div>
            </aside>
        </div>

        <div style="text-align: center; margin-bottom: 60px;">
            <h3 style="color: maroon; font-weight: bold; margin-bottom: 30px;">Grafik Pemesanan Mingguan</h3>
            <div style="background: white; padding: 40px; border-radius: 30px; box-shadow: 0 15px 40px rgba(0,0,0,0.05); max-width: 900px; margin: 0 auto; display: flex; align-items: flex-end; justify-content: space-around; height: 250px;">
                <div style="width: 40px; height: 50%; background: maroon; border-radius: 10px 10px 0 0;"></div>
                <div style="width: 40px; height: 70%; background: maroon; border-radius: 10px 10px 0 0;"></div>
                <div style="width: 40px; height: 40%; background: maroon; border-radius: 10px 10px 0 0;"></div>
                <div style="width: 40px; height: 90%; background: maroon; border-radius: 10px 10px 0 0;"></div>
                <div style="width: 40px; height: 60%; background: maroon; border-radius: 10px 10px 0 0;"></div>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", async function() {
        const loadingElement = document.getElementById('loading-cuaca');
        const infoElement = document.getElementById('info-cuaca');

        try {

            const response = await fetch('https://wttr.in/Surabaya?format=j1');

            if (!response.ok) {
                throw new Error('Gagal mendapatkan respon dari server cuaca.');
            }

            const data = await response.json();

            const kota = data.nearest_area[0].areaName[0].value;
            const suhu = data.current_condition[0].temp_C;
            const deskripsi = data.current_condition[0].weatherDesc[0].value;

            document.getElementById('nama-kota').innerText = kota + " (dan sekitarnya)";
            document.getElementById('suhu-cuaca').innerText = suhu;
            document.getElementById('kondisi-cuaca').innerText = deskripsi;

            loadingElement.style.display = 'none';
            infoElement.style.display = 'flex';

        } catch (error) {
            console.error("Error cuaca:", error);
            loadingElement.style.color = '#dc3545';
            loadingElement.innerText = "⚠️ Gagal memuat data cuaca otomatis. Silakan periksa koneksi internet Anda.";
        }
    });
    </script>
</x-app-layout>