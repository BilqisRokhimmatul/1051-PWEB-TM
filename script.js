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
let dataLapangan = JSON.parse(localStorage.getItem('bilsport_db')) || [
    { kode: "LKR-F001", nama: "Champion Futsal", kategori: "Futsal", lokasi: "Jl. Kaliurang, Sumbersari", harga: 150000, stok: 12 },
    { kode: "LKR-B001", nama: "GOR Argopuro", kategori: "Badminton", lokasi: "Jl. Teuku Umar, Kaliwates", harga: 40000, stok: 8 },
    { kode: "LKR-S001", nama: "GOR PKPSO", kategori: "Basket", lokasi: "Kaliwates (Sport Hall)", harga: 100000, stok: 5 },
    { kode: "LKR-P001", nama: "Jember Padel Court", kategori: "Padel", lokasi: "Jl. Jawa, Sumbersari", harga: 250000, stok: 4 }
];

// 2. FUNGSI RENDER (Menampilkan ke Layar)
const renderAll = () => {
    const cardGrid = document.getElementById('cardGrid');
    const tableBody = document.getElementById('listLapanganTable');
    
    // Kosongkan dulu sebelum diisi
    if(cardGrid) cardGrid.innerHTML = "";
    if(tableBody) tableBody.innerHTML = "";

    dataLapangan.forEach((item, index) => {
        // Render ke Card Maroon
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

        // Render ke Tabel Rincian
        if(tableBody) {
            tableBody.innerHTML += `
                <tr>
                    <td>${index + 1}</td>
                    <td><strong style="color:var(--maroon)">${item.kode}</strong></td>
                    <td>${item.kategori}</td>
                    <td>${item.nama}</td>
                    <td>${item.lokasi}</td>
                    <td>Rp ${parseInt(item.harga).toLocaleString()}</td>
                    <td>
                        <button class="btn-edit-sm" onclick="openModal('edit', ${index})">Edit</button>
                        <button class="btn-hapus-sm" onclick="hapusData(${index})">Hapus</button>
                    </td>
                </tr>
            `;
        }
    });

    // Simpan ke memori browser
    localStorage.setItem('bilsport_db', JSON.stringify(dataLapangan));
};

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
document.getElementById('formLapanganMain').addEventListener('submit', (e) => {
    e.preventDefault();
    const idx = document.getElementById('editIndex').value;
    const newData = {
        kode: document.getElementById('kode').value,
        nama: document.getElementById('nama').value,
        kategori: document.getElementById('kategori').value,
        lokasi: document.getElementById('lokasi').value,
        harga: document.getElementById('harga').value,
        stok: document.getElementById('stok').value,
    };

    if (idx === "-1") {
        dataLapangan.push(newData);
    } else {
        dataLapangan[idx] = newData;
    }

    closeModal();
    renderAll();
});

// 5. HAPUS DATA
window.hapusData = (index) => {
    if(confirm("Yakin mau hapus data ini?")) {
        dataLapangan.splice(index, 1);
        renderAll();
    }
};

// Jalankan fungsi pertama kali
renderAll();