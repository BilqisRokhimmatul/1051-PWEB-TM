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
                        <tbody id="listLapanganTable"></tbody>
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
                        <label class="custom-checkbox"><input type="checkbox" class="filter-kategori" value="Futsal"><span class="checkmark"></span> Futsal</label>
                        <label class="custom-checkbox"><input type="checkbox" class="filter-kategori" value="Badminton"><span class="checkmark"></span> Badminton</label>
                        <label class="custom-checkbox"><input type="checkbox" class="filter-kategori" value="Basket"><span class="checkmark"></span> Basket</label>
                        <label class="custom-checkbox"><input type="checkbox" class="filter-kategori" value="Padel"><span class="checkmark"></span> Padel</label>
                    </div>
                </div>
                <div class="filter-group">
                    <label class="group-label">💰 Rentang Harga</label>
                    <input type="range" id="filterHarga" min="30000" max="500000" step="10000" value="500000" class="styled-range">
                    <div class="price-display"><span>Maks:</span> <strong id="labelHarga">Rp 500,000</strong></div>
                </div>
                <div class="filter-actions">
                    <button class="btn-apply" onclick="applyFilter()">Terapkan</button>
                    <button class="btn-reset" onclick="resetFilter()">Reset</button>
                </div>
            </div>
        </aside>
    </main>

    <div id="modalForm" class="modal-overlay">
        <div class="modal-card">
            <div class="modal-header">
                <h3 id="modalTitle">Tambah Lapangan</h3>
                <span class="close-modal" onclick="closeModal()">&times;</span>
            </div>
            <form id="formLapanganMain">
                <input type="hidden" id="editIndex" value="-1">
                <div class="form-grid">
                    <div class="input-box"><label>Kode Lapangan *</label><input type="text" id="kode" required placeholder="Contoh: L001"></div>
                    <div class="input-box"><label>Nama Lapangan *</label><input type="text" id="nama" required></div>
                    <div class="input-box">
                        <label>Kategori *</label>
                        <select id="kategori" required>
                            <option value="Futsal">Futsal</option>
                            <option value="Badminton">Badminton</option>
                            <option value="Basket">Basket</option>
                            <option value="Padel">Padel</option>
                        </select>
                    </div>
                    <div class="input-box"><label>Lokasi *</label><input type="text" id="lokasi" required placeholder="Gedung A / Lt. 1"></div>
                    <div class="input-box"><label>Harga per Jam *</label><input type="number" id="harga" required></div>
                    <div class="input-box"><label>Stok Jam *</label><input type="number" id="stok" required></div>
                    <div class="input-box"><label>Tanggal Masuk</label><input type="date" id="formTanggal" required></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeModal()">Batal</button>
                    <button type="submit" class="btn-submit">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="statistics-container">
        <div class="stat-card"><h3>Total Item</h3><p id="total-item">15</p></div>
        <div class="stat-card"><h3>Total Nilai Inventaris</h3><p id="total-nilai">Rp 2.500.000</p></div>
        <div class="stat-card warning"><h3>Stok Menipis (< 5)</h3><p id="stok-rendah">3</p></div>
    </div>

    <div class="card-container">
        <div class="card"><h3>5</h3><p>Booking Hari Ini</p></div>
        <div class="card"><h3>156</h3><p>Total Booking</p></div>
        <div class="card"><h3>Futsal</h3><p>Lapangan Terfavorit</p></div>
        <div class="card"><h3>Padel</h3><p>Lapangan Terjarang</p></div>
    </div>

    <section style="padding: 40px 5%; text-align: center;">
        <h2 style="color: #721c24; margin-bottom: 30px;">Grafik Pemesanan Mingguan</h2>
        <div style="background: white; padding: 40px 20px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); max-width: 800px; margin: 0 auto;">
            <div style="display: flex; align-items: flex-end; justify-content: space-around; height: 200px; border-bottom: 2px solid #eee;">
                <div style="width: 40px;"><div style="height: 80px; background: #721c24; border-radius: 5px 5px 0 0;"></div><span>Sen</span></div>
                <div style="width: 40px;"><div style="height: 120px; background: #721c24; border-radius: 5px 5px 0 0;"></div><span>Sel</span></div>
                <div style="width: 40px;"><div style="height: 60px; background: #721c24; border-radius: 5px 5px 0 0;"></div><span>Rab</span></div>
                <div style="width: 40px;"><div style="height: 160px; background: #721c24; border-radius: 5px 5px 0 0;"></div><span>Kam</span></div>
                <div style="width: 40px;"><div style="height: 190px; background: #721c24; border-radius: 5px 5px 0 0;"></div><span>Jum</span></div>
                <div style="width: 40px;"><div style="height: 100px; background: #721c24; border-radius: 5px 5px 0 0;"></div><span>Sab</span></div>
                <div style="width: 40px;"><div style="height: 50px; background: #721c24; border-radius: 5px 5px 0 0;"></div><span>Min</span></div>
            </div>
            <p style="color: #888; font-size: 13px; margin-top: 20px;">*Grafik aktivitas pesanan periode Maret 2026</p>
        </div>
    </section>
@endsection