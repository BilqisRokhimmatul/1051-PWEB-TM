<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LapanganSeeder extends Seeder
{

    public function run(): void
    {
    $data = [
        [
            'kode_lapangan' => 'F01',
            'nama_lapangan' => 'Galaxy Futsal A',
            'kategori' => 'Futsal',
            'lokasi' => 'Indoor Gedung A',
            'harga_per_jam' => 150000,
            'is_available' => true
        ],
        [
            'kode_lapangan' => 'B01',
            'nama_lapangan' => 'PB Smash 1',
            'kategori' => 'Badminton',
            'lokasi' => 'Gedung Olahraga',
            'harga_per_jam' => 50000,
            'is_available' => true
        ],
        [
            'kode_lapangan' => 'P01',
            'nama_lapangan' => 'Padel Jember 1',
            'kategori' => 'Padel',
            'lokasi' => 'Outdoor Lt. 2',
            'harga_per_jam' => 200000,
            'is_available' => false
        ],
    ];

    foreach($data as $d) {
        \App\Models\Lapangan::create($d);
    }
    }
}
