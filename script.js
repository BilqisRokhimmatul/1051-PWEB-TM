// 1. DATA DATABASE (15 DATA)
let dataTransaksi = [
    { id: 1, nama: "Bilqis Rokhimmatul", lapangan: "Champion Futsal", kategori: "Futsal", tanggal: "2026-03-20", jam: "19:00 - 20:00", status: "Booking" },
    { id: 2, nama: "Farrah Diva", lapangan: "GOR PKPSO", kategori: "Badminton", tanggal: "2026-03-18", jam: "16:00 - 18:00", status: "Selesai" },
    { id: 3, nama: "Shinta Bella", lapangan: "Jember Sport Hall", kategori: "Basket", tanggal: "2026-03-19", jam: "20:00 - 21:00", status: "Batal" },
    { id: 4, nama: "Najwa Khuril", lapangan: "Champion Futsal", kategori: "Futsal", tanggal: "2026-03-21", jam: "08:00 - 09:00", status: "Booking" },
    { id: 5, nama: "Neva Maritza", lapangan: "Jember Sport Hall", kategori: "Basket", tanggal: "2026-03-15", jam: "15:00 - 16:00", status: "Selesai" },
    { id: 6, nama: "Syifa Qolbi", lapangan: "GOR PKPSO", kategori: "Badminton", tanggal: "2026-03-22", jam: "19:00 - 21:00", status: "Booking" },
    { id: 7, nama: "Thalia Kufanda", lapangan: "Champion Futsal", kategori: "Futsal", tanggal: "2026-03-14", jam: "10:00 - 11:00", status: "Selesai" },
    { id: 8, nama: "Husni Bachrie", lapangan: "Jember Sport Hall", kategori: "Basket", tanggal: "2026-03-23", jam: "21:00 - 22:00", status: "Booking" },
    { id: 9, nama: "Reza Nero", lapangan: "Padel Center Jember", kategori: "Padel", tanggal: "2026-03-17", jam: "13:00 - 14:00", status: "Batal" },
    { id: 10, nama: "Zaki Jopay", lapangan: "Champion Futsal", kategori: "Futsal", tanggal: "2026-03-16", jam: "17:00 - 18:00", status: "Selesai" },
    { id: 11, nama: "Alif Sanda", lapangan: "Jember Sport Hall", kategori: "Basket", tanggal: "2026-03-24", jam: "19:00 - 20:00", status: "Booking" },
    { id: 12, nama: "Galen Kawiswara", lapangan: "GOR PKPSO", kategori: "Badminton", tanggal: "2026-03-13", jam: "09:00 - 11:00", status: "Selesai" },
    { id: 13, nama: "Damar Wulan", lapangan: "Padel Center Jember", kategori: "Padel", tanggal: "2026-03-25", jam: "20:00 - 22:00", status: "Booking" },
    { id: 14, nama: "Citra Dwi", lapangan: "Jember Sport Hall", kategori: "Basket", tanggal: "2026-03-12", jam: "14:00 - 15:00", status: "Batal" },
    { id: 15, nama: "Fawwaz Aydin", lapangan: "GOR PKPSO", kategori: "Badminton", tanggal: "2026-03-26", jam: "07:00 - 08:00", status: "Booking" }
];
// 2. FUNGSI UNTUK MENAMPILKAN DATA KE TABEL
function renderTabel(data) {
    const tbody = document.getElementById('listTransaksi');
    if (!tbody) return; // Jaga-jaga kalau ID salah
    
    tbody.innerHTML = ""; 
    
    data.forEach((item) => {
        let classWarna = "";
        // Cek status untuk kasih warna badge
        if (item.status === "Booking") classWarna = "bg-booking";
        else if (item.status === "Selesai") classWarna = "bg-selesai";
        else if (item.status === "Batal") classWarna = "bg-batal";
        
        const row = `
            <tr>
                <td>${item.id}</td>
                <td>${item.nama}</td>
                <td>${item.kategori}</td>
                <td>${item.lapangan}</td>
                <td>${item.tanggal}</td>
                <td>${item.jam}</td>
                <td><span class="badge-status ${classWarna}">${item.status}</span></td>
            </tr>
        `;
        tbody.insertAdjacentHTML('beforeend', row);
    });
}

// 3. LOGIKA SEARCH (FILTER)
function setupSearch() {
    const inputSearch = document.getElementById('inputSearch');
    const formSearch = document.getElementById('formSearch');

    if (inputSearch && formSearch) {
        // Saat ngetik langsung filter
        inputSearch.addEventListener('keyup', function() {
            const kataKunci = inputSearch.value.toLowerCase().trim();
            
            const hasilFilter = dataTransaksi.filter((item) => {
                return item.lapangan.toLowerCase().includes(kataKunci);
            });
            
            renderTabel(hasilFilter);
        });

        // Saat tombol cari diklik biar gak reload
        formSearch.addEventListener('submit', function(e) {
            e.preventDefault();
        });
    }
}

// 4. JALANKAN SEMUA SAAT HALAMAN DIBUKA
renderTabel(dataTransaksi);
setupSearch();
// 1. DATA ASLI JEMBER
let dataLapangan = [
    { kode: "LKR-F01", nama: "Champion Futsal", kategori: "Futsal", lokasi: "Sumbersari", harga: 150000, tanggal: "2026-04-01" },
    { kode: "LKR-B01", nama: "GOR Argopuro", kategori: "Badminton", lokasi: "Kaliwates", harga: 40000, tanggal: "2026-04-02" },
    { kode: "LKR-S01", nama: "GOR PKPSO", kategori: "Basket", lokasi: "Kaliwates", harga: 100000, tanggal: "2026-04-03" },
    { kode: "LKR-P01", nama: "Jember Padel", kategori: "Padel", lokasi: "Sumbersari", harga: 250000, tanggal: "2026-04-04" },
    { kode: "LKR-F02", nama: "Scudetto Futsal", kategori: "Futsal", lokasi: "Kebonsari", harga: 130000, tanggal: "2026-04-05" },
    { kode: "LKR-B02", nama: "GOR Garuda", kategori: "Badminton", lokasi: "Sumbersari", harga: 35000, tanggal: "2026-04-06" },
    { kode: "LKR-B03", nama: "Niki Badminton", kategori: "Badminton", lokasi: "Patrang", harga: 30000, tanggal: "2026-04-07" },
    { kode: "LKR-F03", nama: "Galaxy Futsal", kategori: "Futsal", lokasi: "Arjasa", harga: 110000, tanggal: "2026-04-08" },
    { kode: "LKR-S02", nama: "Kancil Mas Basket", kategori: "Basket", lokasi: "Kaliwates", harga: 90000, tanggal: "2026-04-09" },
    { kode: "LKR-P02", nama: "Padel Jember 2", kategori: "Padel", lokasi: "Jember Kidul", harga: 200000, tanggal: "2026-04-10" },
    { kode: "LKR-F04", nama: "Indo Futsal", kategori: "Futsal", lokasi: "Kaliwates", harga: 140000, tanggal: "2026-04-11" },
    { kode: "LKR-B04", nama: "Mirota Badminton", kategori: "Badminton", lokasi: "Kaliwates", harga: 45000, tanggal: "2026-04-12" }
];

// 2. FUNGSI RENDER (Menampilkan ke Layar)
// Tambahkan parameter 'data', defaultnya adalah dataLapangan asli
const renderAll = (data = dataLapangan) => {
    const cardGrid = document.getElementById('cardGrid');
    const tableBody = document.getElementById('listLapanganTable');
    
    if(cardGrid) cardGrid.innerHTML = "";
    if(tableBody) tableBody.innerHTML = "";

    // Sekarang kita looping dari parameter 'data', bukan 'dataLapangan' global
    data.forEach((item, index) => {
        // Render ke Card
        if(cardGrid) {
            cardGrid.innerHTML += `
                <div class="blue-card">
                    <div class="card-top">
                        <strong>${item.kode}</strong>
                        <span style="font-size: 10px; background: #fff; color: var(--maroon); padding: 2px 8px; border-radius: 10px; font-weight: bold;">Tersedia</span>
                    </div>
                    <div class="card-content">
                        <p>🏠 <strong>${item.nama}</strong></p>
                        <p>📍 ${item.lokasi}</p>
                        <p>🎾 Kategori: ${item.kategori}</p>
                    </div>
                    <div class="card-bottom">
                        <span class="card-price">Rp ${parseInt(item.harga).toLocaleString()}</span>
                        <div>
                            <button onclick="openModal('edit', ${index})" style="border:none; background:none; cursor:pointer;">📝</button>
                            <button onclick="hapusData(${index})" style="border:none; background:none; cursor:pointer;">🗑️</button>
                        </div>
                    </div>
                </div>
            `;
        }

        // Render ke Tabel
        if(tableBody) {
            tableBody.innerHTML += `
                <tr>
                    <td>${index + 1}</td>
                    <td><strong style="color:var(--maroon)">${item.kode}</strong></td>
                    <td>${item.kategori}</td>
                    <td>${item.nama}</td>
                    <td>${item.lokasi}</td>
                    <td>Rp ${parseInt(item.harga).toLocaleString()}</td>
                    <td>${item.tanggal}</td>
                    <td>
                        <button class="btn-edit-sm" onclick="openModal('edit', ${index})">Edit</button>
                        <button class="btn-hapus-sm" onclick="hapusData(${index})">Hapus</button>
                    </td>
                </tr>
            `;
        }
    });

    // Cek jika data kosong (untuk filter)
    if (data.length === 0 && cardGrid) {
        cardGrid.innerHTML = "<p style='grid-column: 1/-1; text-align:center; padding:20px;'>Yah, tidak ada lapangan yang cocok...</p>";
    }
};
    // Simpan ke memori browser
    localStorage.setItem('bilsport_db', JSON.stringify(dataLapangan));


// 3. LOGIKA MODAL (Tambah & Edit)
window.openModal = (type, index = -1) => {
    document.getElementById('modalForm').style.display = 'flex';
    if (type === 'edit') {
        const item = dataLapangan[index];
        document.getElementById('modalTitle').innerText = "Edit Data Lapangan";
        document.getElementById('editIndex').value = index;
        document.getElementById('kode').value = item.kode;
        document.getElementById('nama').value = item.nama;
        document.getElementById('kategori').value = item.kategori;
        document.getElementById('lokasi').value = item.lokasi;
        document.getElementById('harga').value = item.harga;
        document.getElementById('stok').value = item.stok;
    } else {
        document.getElementById('modalTitle').innerText = "Tambah Lapangan Baru";
        document.getElementById('formLapanganMain').reset();
        document.getElementById('editIndex').value = "-1";
    }
};

window.closeModal = () => {
    document.getElementById('modalForm').style.display = 'none';
};

// 4. SIMPAN DATA
// 4. SIMPAN DATA
document.getElementById('formLapanganMain').addEventListener('submit', (e) => {
    e.preventDefault();
    const idx = document.getElementById('editIndex').value;

    // --- DISINI TEMPATNYA! SELIPIN BARIS TANGGAL DI BAWAH STOK ---
    const newData = {
        kode: document.getElementById('kode').value,
        nama: document.getElementById('nama').value,
        kategori: document.getElementById('kategori').value,
        lokasi: document.getElementById('lokasi').value,
        harga: document.getElementById('harga').value,
        stok: document.getElementById('stok').value,
        tanggal: document.getElementById('formTanggal').value // <--- TAMBAHIN INI JANGAN SAMPAI KETINGGALAN
    };
    // ----------------------------------------------------------

    if (idx === "-1") {
        dataLapangan.push(newData);
        // --- NOTIFIKASI TAMBAH ---
        alert("Sip! Lapangan baru berhasil ditambahin."); 
    } else {
        dataLapangan[idx] = newData;
        // --- NOTIFIKASI UBAH ---
        alert("Oke! Data lapangan berhasil diupdate."); 
    }

    closeModal();
    renderAll();
});

// 5. HAPUS DATA
window.hapusData = (index) => {
    if(confirm("Yakin mau hapus data ini?")) {
        dataLapangan.splice(index, 1);
        renderAll();
        // --- NOTIFIKASI HAPUS ---
        alert("Data berhasil dihapus!");
    }
};

// Jalankan fungsi pertama kali
renderAll();

// Fungsi Filter
// Fungsi Filter
window.applyFilter = () => {
    const checkboxes = document.querySelectorAll('.filter-kategori:checked');
    const kategoriDipilih = Array.from(checkboxes).map(cb => cb.value);
    const hargaMaks = document.getElementById('filterHarga').value;

    const dataTersaring = dataLapangan.filter(item => {
        const matchKategori = kategoriDipilih.length === 0 || kategoriDipilih.includes(item.kategori);
        const matchHarga = parseInt(item.harga) <= parseInt(hargaMaks);
        return matchKategori && matchHarga;
    });

    // Panggil fungsi render utama dengan data yang sudah disaring
    renderAll(dataTersaring); 
};
// Fungsi Render Khusus Hasil Filter
const renderFiltered = (dataTerfilter) => {
    const cardGrid = document.getElementById('cardGrid');
    const tableBody = document.getElementById('listLapanganTable');

    cardGrid.innerHTML = "";
    tableBody.innerHTML = "";

    if (dataTerfilter.length === 0) {
        cardGrid.innerHTML = "<p style='grid-column: 1/-1; text-align:center; padding:20px;'>Yah, tidak ada lapangan yang cocok...</p>";
        return;
    }

    // Pakai logika render yang sama dengan renderAll tapi sumber datanya dataTerfilter
    dataTerfilter.forEach((item, index) => {
        // ... (Masukkan kode render card dan row tabel seperti di fungsi renderAll kamu) ...
        // Tips: Biar praktis, fungsi renderAll kamu sebaiknya menerima parameter data (data = dataLapangan)
    });
};

// Update Label Harga secara Real-time saat slider digeser
document.getElementById('filterHarga')?.addEventListener('input', function() {
    document.getElementById('labelHarga').innerText = "Rp " + parseInt(this.value).toLocaleString();
});

// Fungsi Reset
window.resetFilter = () => {
    document.querySelectorAll('.filter-kategori').forEach(cb => cb.checked = false);
    document.getElementById('filterHarga').value = 300000;
    document.getElementById('labelHarga').innerText = "Rp 300,000";
    renderAll(); // Kembalikan ke data awal
};

// Fungsi Cari Lapangan
// Fungsi Cari Lapangan (Pencarian Real-time)
window.handleSearch = () => {
    // 1. Ambil kata kunci dari input search
    const keyword = document.getElementById('searchInput').value.toLowerCase().trim();
    
    // 2. Filter data: Cek apakah Nama ATAU Kode mengandung kata kunci
    const hasilCari = dataLapangan.filter(item => {
        return item.nama.toLowerCase().includes(keyword) || 
               item.kode.toLowerCase().includes(keyword); // <--- Ini yang WAJIB ada sesuai soal
    });

    // 3. Tampilkan hasilnya ke grid dan tabel
    renderAll(hasilCari);
};


