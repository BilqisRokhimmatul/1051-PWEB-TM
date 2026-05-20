<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Admin Bilsport') }}
        </h2>
    </x-slot>

    <div class="py-12" style="background-color: #FDF5E6; min-height: 100vh;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-8">
                
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 25px;">
                    <h2 style="color: maroon; font-weight: bold; font-size: 1.5rem;">Daftar Lapangan</h2>
                <div class="bg-white text-black dark:bg-black dark:text-white" style="padding: 20px; margin-bottom: 20px; border: 2px solid red;">
                    📢 HALO BILQIS! Kalau kotak ini berubah jadi HITAM, berarti Dark Mode kamu SUDAH BERHASIL!
                </div>
                    <a href="{{ route('lapangan.create') }}" style="background: maroon; color: white; padding: 10px 20px; text-decoration: none; border-radius: 8px; font-weight: bold; font-size: 0.9rem;">
                        + Tambah Lapangan
                    </a>
                </div>

                <div style="margin-bottom: 25px; background: #FFF5F5; padding: 15px; border-radius: 10px; border: 1px solid #FFD3D3;">
                    <label for="search-lapangan" style="display: block; font-weight: bold; color: maroon; margin-bottom: 8px; font-size: 0.9rem;">
                        🔍 Cari Lapangan Olahraga (Live Search):
                    </label>
                    <input type="text" id="search-lapangan" placeholder="Ketik nama lapangan yang ingin dicari..." 
                        style="width: 100%; padding: 10px 15px; border: 1px solid #ccc; border-radius: 8px; font-size: 0.95rem; outline: none; transition: 0.3s;"
                        onfocus="this.style.borderColor='maroon'; this.style.boxShadow='0 0 5px rgba(128,0,0,0.2)'"
                        onblur="this.style.borderColor='#ccc'; this.style.boxShadow='none'">
                    <span id="search-loading" style="display: none; font-size: 0.85rem; color: #666; font-style: italic; margin-top: 5px;">
                        🔄 Sedang mencari data...
                    </span>
                </div>
                <div class="overflow-x-auto">
                    <table style="width: 100%; border-collapse: collapse; background: white; border-radius: 10px; overflow: hidden; box-shadow: 0 5px 15px rgba(0,0,0,0.05);">
                        <thead style="background: maroon; color: white;">
                            <tr>
                                <th style="padding: 15px; text-align: left;">Kode</th>
                                <th style="padding: 15px; text-align: left;">Nama Lapangan</th>
                                <th style="padding: 15px; text-align: left;">Kategori</th>
                                <th style="padding: 15px; text-align: left;">Harga/Jam</th>
                                <th style="padding: 15px; text-align: center;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tabel-lapangan">
                            @forelse($lapangans as $lp)
                            <tr style="border-bottom: 1px solid #eee;">
                                <td style="padding: 15px;">{{ $lp->kode_lapangan }}</td>
                                <td style="padding: 15px;">{{ $lp->nama_lapangan }}</td>
                                <td style="padding: 15px;">{{ $lp->kategori }}</td>
                                <td style="padding: 15px;">Rp {{ number_format($lp->harga_per_jam) }}</td>
                                <td style="padding: 15px; text-align: center;">
                                    <a href="{{ route('lapangan.show', $lp->id) }}" style="color: #3b82f6; text-decoration: none; font-weight: 500;">Detail</a> |
                                    <a href="{{ route('lapangan.edit', $lp->id) }}" style="color: #f59e0b; text-decoration: none; font-weight: 500;">Edit</a> |
                                    <form action="{{ route('lapangan.destroy', $lp->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus lapangan ini?')">
                                        @csrf @method('DELETE')
                                        <button type="submit" style="color: #ef4444; background: none; border: none; cursor: pointer; font-weight: 500;">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" style="padding: 20px; text-align: center; color: gray;">Belum ada data lapangan.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div id="pagination-container" style="margin-top: 20px;">
                    {{ $lapangans->links() }}
                </div>

            </div>
        </div>
    </div>

    <script>
    document.getElementById('search-lapangan').addEventListener('input', async function(e) {
        const keyword = e.target.value;
        const tabelBody = document.getElementById('tabel-lapangan');
        const loadingIndicator = document.getElementById('search-loading');
        const paginationContainer = document.getElementById('pagination-container');

        if (keyword.trim() === '') {
            window.location.reload();
            return;
        }

        loadingIndicator.style.display = 'block';

        try {
            const response = await fetch(`/lapangan/search?keyword=${encodeURIComponent(keyword)}`);
            
            if (!response.ok) {
                throw new Error('Gagal mengambil data pencarian.');
            }

            const data = await response.json();
            tabelBody.innerHTML = '';

            if (data.length > 0) {
                paginationContainer.style.display = 'none';

                data.forEach(lp => {
                    const hargaFormat = new Intl.NumberFormat('id-ID').format(lp.harga_per_jam);

                    const row = document.createElement('tr');
                    row.style.borderBottom = '1px solid #eee';
                    row.innerHTML = `
                        <td style="padding: 15px;">${lp.kode_lapangan}</td>
                        <td style="padding: 15px;">${lp.nama_lapangan}</td>
                        <td style="padding: 15px;">${lp.kategori}</td>
                        <td style="padding: 15px;">Rp ${hargaFormat}</td>
                        <td style="padding: 15px; text-align: center;">
                            <a href="/lapangan/${lp.id}" style="color: #3b82f6; text-decoration: none; font-weight: 500;">Detail</a> |
                            <a href="/lapangan/${lp.id}/edit" style="color: #f59e0b; text-decoration: none; font-weight: 500;">Edit</a> |
                            <form action="/lapangan/${lp.id}" method="POST" style="display:inline;" onsubmit="return confirm('Yakin hapus lapangan ini?')">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" style="color: #ef4444; background: none; border: none; cursor: pointer; font-weight: 500;">Hapus</button>
                            </form>
                        </td>
                    `;
                    tabelBody.appendChild(row);
                });
            } else {
                tabelBody.innerHTML = `
                    <tr>
                        <td colspan="5" style="padding: 20px; text-align: center; color: gray;">
                            ⚠️ Lapangan dengan kata kunci "${keyword}" tidak ditemukan.
                        </td>
                    </tr>
                `;
            }
        } catch (error) {
            console.error("Error Live Search:", error);
        } finally {
            loadingIndicator.style.display = 'none';
        }
    });
    </script>
</x-app-layout>