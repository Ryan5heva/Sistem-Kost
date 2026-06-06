<?php

namespace Database\Seeders;

use App\Models\Kamar;
use Illuminate\Database\Seeder;

class KamarSeeder extends Seeder
{
    public function run(): void
    {
        $kamar = [
            [
                'nomor_kamar' => 'A1',
                'tipe' => 'Standard',
                'harga_per_bulan' => 500000,
                'status' => 'tersedia',
                'fasilitas' => 'WiFi, Kasur, Lemari, Kipas Angin',
            ],
            [
                'nomor_kamar' => 'A2',
                'tipe' => 'Standard',
                'harga_per_bulan' => 500000,
                'status' => 'terisi',
                'fasilitas' => 'WiFi, Kasur, Lemari, Kipas Angin',
            ],
            [
                'nomor_kamar' => 'B1',
                'tipe' => 'Deluxe',
                'harga_per_bulan' => 750000,
                'status' => 'tersedia',
                'fasilitas' => 'WiFi, AC, Kasur, Lemari, Kamar Mandi Dalam',
            ],
            [
                'nomor_kamar' => 'B2',
                'tipe' => 'Deluxe',
                'harga_per_bulan' => 750000,
                'status' => 'terisi',
                'fasilitas' => 'WiFi, AC, Kasur, Lemari, Kamar Mandi Dalam',
            ],
            [
                'nomor_kamar' => 'C1',
                'tipe' => 'VIP',
                'harga_per_bulan' => 1200000,
                'status' => 'tersedia',
                'fasilitas' => 'WiFi, AC, Kasur Spring Bed, Lemari, Kamar Mandi Dalam, TV, Kulkas',
            ],
        ];

        foreach ($kamar as $k) {
            Kamar::create($k);
        }
    }
}