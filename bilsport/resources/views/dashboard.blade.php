@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <section class="hero">
        <h1>Selamat Datang di Sistem Booking Lapangan Jember</h1>
        <p>Solusi mudah, cepat, dan online untuk reservasi lapangan futsal, badminton, dan basket di Kota Jember.</p>
    </section>

    <div class="header-halaman">
        <div class="judul-kiri">
            <h2 class="page-title">Daftar Lapangan</h2>
        </div>
        <div class="tombol-kanan">
            <button class="btn-add-main" onclick="openModal('tambah')">+ Tambah Lapangan</button>
        </div>
    </div>

    <div class="statistics-container" style="display: flex; gap: 20px; padding: 20px 5%; justify-content: space-around;">
        @foreach($stats as $s)
            @include('components.stat-card', [
                'judul' => $s['judul'], 
                'nilai' => $s['nilai'], 
                'ikon' => $s['ikon'], 
                'warna' => $s['warna']
            ])
        @endforeach
    </div>

    <main class="dashboard-container">
        <section class="content-left">
            <div id="cardGrid" class="card-grid-4"></div>

            <div class="table-section-nanti" style="margin-top: 40px;">
                <h3 style="color: var(--maroon); margin-bottom: 15px;">Daftar Lengkap Data Lapangan</h3>
                <div class="table-container">
                    <table class="modern-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode</th>
                                <th>Kategori</th>
                                <th>Nama Lapangan</th>
                                <th>Lokasi</th>
                                <th>Harga</th>
                                <th>Tanggal Masuk</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="listLapanganTable">
                            @forelse($lapangans as $key => $lp)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $lp['kode'] }}</td>
                                    <td>{{ $lp['kat'] }}</td>
                                    <td>{{ $lp['nama'] }}</td>
                                    <td>{{ $lp['lok'] }}</td>
                                    <td>Rp {{ $lp['harga'] }}</td>
                                    <td>{{ $lp['tgl'] }}</td>
                                    <td>
                                        <button class="btn-edit" style="background: #ffc107; border:none; padding: 5px 10px; border-radius: 4px;">Edit</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" style="text-align: center; padding: 20px;">Data lapangan belum tersedia.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        
        <aside class="sidebar-right">
            <div class="filter-card">
                <h3 class="filter-title">Filter Lapangan</h3>
                <div class="filter-group">
                    <label class="group-label">🎾 Kategori Olahraga</label>
                    <div class="checkbox-container">
                        <label class="custom-checkbox"><input type="checkbox" value="Futsal"> Futsal</label>
                        <label class="custom-checkbox"><input type="checkbox" value="Badminton"> Badminton</label>
                    </div>
                </div>
                <div class="filter-actions">
                    <button class="btn-apply" style="width: 100%; padding: 10px; background: maroon; color: white; border: none; border-radius: 5px; margin-top: 10px;">Terapkan</button>
                </div>
            </div>
        </aside>
    </main>

    <section style="padding: 40px 5%; text-align: center;">
        <h2 style="color: #721c24; margin-bottom: 30px;">Grafik Pemesanan Mingguan</h2>
        <div style="background: white; padding: 40px 20px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); max-width: 800px; margin: 0 auto;">
            <div style="display: flex; align-items: flex-end; justify-content: space-around; height: 150px; border-bottom: 2px solid #eee;">
                <div style="width: 30px; height: 60%; background: maroon; border-radius: 5px 5px 0 0;"></div>
                <div style="width: 30px; height: 80%; background: maroon; border-radius: 5px 5px 0 0;"></div>
                <div style="width: 30px; height: 40%; background: maroon; border-radius: 5px 5px 0 0;"></div>
                <div style="width: 30px; height: 95%; background: maroon; border-radius: 5px 5px 0 0;"></div>
            </div>
            <p style="color: #888; font-size: 12px; mt-3">Statistik Mingguan</p>
        </div>
    </section>
@endsection

@push('scripts')
<script>
    console.log("Dashboard Blade Berhasil Dimuat!");
</script>
@endpush

