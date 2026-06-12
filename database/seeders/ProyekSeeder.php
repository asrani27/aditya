<?php

namespace Database\Seeders;

use App\Models\Proyek;
use Illuminate\Database\Seeder;

class ProyekSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proyeks = [
            [
                'kode_proyek' => 'PRJ001',
                'customer_id' => 1,
                'nama_proyek' => 'Pembangunan Gedung Perkantoran',
                'deskripsi' => 'Proyek pembangunan gedung perkantoran 10 lantai',
                'lokasi' => 'Jl. Sudirman, Jakarta Selatan',
                'nilai_kontrak' => 5000000000,
                'tanggal_mulai' => '2024-01-15',
                'tanggal_selesai' => '2024-12-15',
                'status' => 'Berjalan',
                'progress' => 65,
            ],
            [
                'kode_proyek' => 'PRJ002',
                'customer_id' => 2,
                'nama_proyek' => 'Renovasi Rumah Sakit Umum',
                'deskripsi' => 'Renovasi total bagian rawat inap',
                'lokasi' => 'Jl. Rumah Sakit No. 10, Bandung',
                'nilai_kontrak' => 3500000000,
                'tanggal_mulai' => '2024-02-01',
                'tanggal_selesai' => '2024-08-30',
                'status' => 'Berjalan',
                'progress' => 45,
            ],
            [
                'kode_proyek' => 'PRJ003',
                'customer_id' => 5,
                'nama_proyek' => 'Pembangunan Apartment Mewah',
                'deskripsi' => 'Pembangunan apartment 25 lantai dengan fasilitas lengkap',
                'lokasi' => 'Jl. Thamrin, Jakarta Pusat',
                'nilai_kontrak' => 15000000000,
                'tanggal_mulai' => '2024-03-10',
                'tanggal_selesai' => '2025-06-10',
                'status' => 'Berjalan',
                'progress' => 30,
            ],
            [
                'kode_proyek' => 'PRJ004',
                'customer_id' => 3,
                'nama_proyek' => 'Pemasangan Jaringan Listrik',
                'deskripsi' => 'Instalasi jaringan listrik untuk kawasan industri',
                'lokasi' => 'Kawasan Industri, Surabaya',
                'nilai_kontrak' => 1200000000,
                'tanggal_mulai' => '2024-01-20',
                'tanggal_selesai' => '2024-05-20',
                'status' => 'Selesai',
                'progress' => 100,
            ],
            [
                'kode_proyek' => 'PRJ005',
                'customer_id' => 6,
                'nama_proyek' => 'Pembangunan Pabrik Manufaktur',
                'deskripsi' => 'Pembangunan pabrik dengan luas 5000m2',
                'lokasi' => 'Jl. Industri Raya, Cikarang',
                'nilai_kontrak' => 8000000000,
                'tanggal_mulai' => '2024-04-05',
                'tanggal_selesai' => '2024-10-05',
                'status' => 'Berjalan',
                'progress' => 55,
            ],
            [
                'kode_proyek' => 'PRJ006',
                'customer_id' => 7,
                'nama_proyek' => 'Pengaspalan Jalan Tol',
                'deskripsi' => 'Pengaspalan ruas tol sepanjang 20km',
                'lokasi' => 'Tol Trans Jawa, Semarang',
                'nilai_kontrak' => 2500000000,
                'tanggal_mulai' => '2024-02-15',
                'tanggal_selesai' => '2024-07-15',
                'status' => 'Selesai',
                'progress' => 100,
            ],
            [
                'kode_proyek' => 'PRJ007',
                'customer_id' => 9,
                'nama_proyek' => 'Pembangunan Hotel Bintang 5',
                'deskripsi' => 'Hotel bintang 5 dengan 200 kamar',
                'lokasi' => 'Jl. Pantai Kuta, Bali',
                'nilai_kontrak' => 20000000000,
                'tanggal_mulai' => '2024-05-01',
                'tanggal_selesai' => '2025-04-01',
                'status' => 'Berjalan',
                'progress' => 20,
            ],
            [
                'kode_proyek' => 'PRJ008',
                'customer_id' => 8,
                'nama_proyek' => 'Pemasangan Pipa Air Bersih',
                'deskripsi' => 'Instalasi pipa air bersih untuk perumahan',
                'lokasi' => 'Kota Baru, Yogyakarta',
                'nilai_kontrak' => 1800000000,
                'tanggal_mulai' => '2024-03-20',
                'tanggal_selesai' => '2024-09-20',
                'status' => 'Berjalan',
                'progress' => 50,
            ],
            [
                'kode_proyek' => 'PRJ009',
                'customer_id' => 10,
                'nama_proyek' => 'Pembangunan Sekolah Dasar',
                'deskripsi' => 'Pembangunan SD dengan 12 ruang kelas',
                'lokasi' => 'Jl. Pendidikan No. 5, Malang',
                'nilai_kontrak' => 950000000,
                'tanggal_mulai' => '2024-01-10',
                'tanggal_selesai' => '2024-06-10',
                'status' => 'Selesai',
                'progress' => 100,
            ],
            [
                'kode_proyek' => 'PRJ010',
                'customer_id' => 1,
                'nama_proyek' => 'Renovasi Mall Centropolis',
                'deskripsi' => 'Renovasi interior dan eksterior mall',
                'lokasi' => 'Jl. Sudirman, Jakarta Selatan',
                'nilai_kontrak' => 6000000000,
                'tanggal_mulai' => '2024-06-01',
                'tanggal_selesai' => '2024-12-01',
                'status' => 'Berjalan',
                'progress' => 15,
            ],
            [
                'kode_proyek' => 'PRJ011',
                'customer_id' => 11,
                'nama_proyek' => 'Pemasangan Jaringan Fiber Optik',
                'deskripsi' => 'Instalasi jaringan fiber optik untuk perkantoran',
                'lokasi' => 'Kota Surabaya, Jawa Timur',
                'nilai_kontrak' => 2200000000,
                'tanggal_mulai' => '2024-04-15',
                'tanggal_selesai' => '2024-10-15',
                'status' => 'Berjalan',
                'progress' => 40,
            ],
            [
                'kode_proyek' => 'PRJ012',
                'customer_id' => 4,
                'nama_proyek' => 'Pembangunan Masjid Al-Munawaroh',
                'deskripsi' => 'Pembangunan masjid dengan kapasitas 500 jama\'ah',
                'lokasi' => 'Jl. Masjid Raya, Palembang',
                'nilai_kontrak' => 4500000000,
                'tanggal_mulai' => '2024-02-20',
                'tanggal_selesai' => '2024-11-20',
                'status' => 'Berjalan',
                'progress' => 60,
            ],
        ];

        foreach ($proyeks as $proyek) {
            Proyek::create($proyek);
        }
    }
}
