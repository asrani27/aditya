<?php

namespace Database\Seeders;

use App\Models\Monitoring;
use Illuminate\Database\Seeder;

class MonitoringSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $monitorings = [
            [
                'nomor_monitoring' => 'MON-2026-001',
                'tanggal_monitoring' => '2026-01-05',
                'proyek_id' => 1,
                'pegawai_id' => 1,
                'tahapan_pekerjaan' => 'Perencanaan dan Persiapan',
                'detail_tugas' => 'Mempersiapkan material dan alat kerja untuk tahap awal konstruksi',
                'tanggal_selesai' => '2026-01-15',
                'status' => 'Selesai',
                'progress' => 100,
                'keterangan' => 'Semua material sudah siap di lokasi',
            ],
            [
                'nomor_monitoring' => 'MON-2026-002',
                'tanggal_monitoring' => '2026-01-16',
                'proyek_id' => 1,
                'pegawai_id' => 2,
                'tahapan_pekerjaan' => 'Pondasi',
                'detail_tugas' => 'Pengecoran pondasi bangunan utama',
                'tanggal_selesai' => '2026-02-01',
                'status' => 'Selesai',
                'progress' => 100,
                'keterangan' => 'Pondasi sudah terpasang dengan baik',
            ],
            [
                'nomor_monitoring' => 'MON-2026-003',
                'tanggal_monitoring' => '2026-02-05',
                'proyek_id' => 1,
                'pegawai_id' => 3,
                'tahapan_pekerjaan' => 'Struktur Beton',
                'detail_tugas' => 'Pemasangan besi tulangan dan cetakan kolom',
                'tanggal_selesai' => '2026-02-20',
                'status' => 'Selesai',
                'progress' => 100,
                'keterangan' => 'Struktur kolom sudah selesai',
            ],
            [
                'nomor_monitoring' => 'MON-2026-004',
                'tanggal_monitoring' => '2026-02-21',
                'proyek_id' => 2,
                'pegawai_id' => 1,
                'tahapan_pekerjaan' => 'Studi Kelayakan',
                'detail_tugas' => 'Analisis lokasi dan kondisi tanah untuk pembangunan',
                'tanggal_selesai' => '2026-03-05',
                'status' => 'Selesai',
                'progress' => 100,
                'keterangan' => 'Hasil studi kelayakan sudah disetujui',
            ],
            [
                'nomor_monitoring' => 'MON-2026-005',
                'tanggal_monitoring' => '2026-03-10',
                'proyek_id' => 2,
                'pegawai_id' => 4,
                'tahapan_pekerjaan' => 'Perancangan Detail',
                'detail_tugas' => 'Membuat desain arsitektur dan struktural detail',
                'tanggal_selesai' => '2026-03-25',
                'status' => 'Selesai',
                'progress' => 100,
                'keterangan' => 'Desain sudah final dan siap dieksekusi',
            ],
            [
                'nomor_monitoring' => 'MON-2026-006',
                'tanggal_monitoring' => '2026-03-26',
                'proyek_id' => 3,
                'pegawai_id' => 2,
                'tahapan_pekerjaan' => 'Pengukuran Lokasi',
                'detail_tugas' => 'Melakukan pengukuran akurat untuk pondasi',
                'tanggal_selesai' => '2026-04-05',
                'status' => 'Selesai',
                'progress' => 100,
                'keterangan' => 'Pengukuran selesai dengan akurasi tinggi',
            ],
            [
                'nomor_monitoring' => 'MON-2026-007',
                'tanggal_monitoring' => '2026-04-10',
                'proyek_id' => 3,
                'pegawai_id' => 3,
                'tahapan_pekerjaan' => 'Pemasangan Pipa',
                'detail_tugas' => 'Instalasi sistem plumbing dan drainase',
                'tanggal_selesai' => '2026-04-25',
                'status' => 'Selesai',
                'progress' => 100,
                'keterangan' => 'Pipa sudah terpasang sesuai standar',
            ],
            [
                'nomor_monitoring' => 'MON-2026-008',
                'tanggal_monitoring' => '2026-05-01',
                'proyek_id' => 1,
                'pegawai_id' => 1,
                'tahapan_pekerjaan' => 'Finishing Exterior',
                'detail_tugas' => 'Pengecatan dan penataan facade bangunan',
                'tanggal_selesai' => '2026-05-20',
                'status' => 'Dalam Progress',
                'progress' => 75,
                'keterangan' => 'Saat ini sedang dalam proses pengecatan',
            ],
            [
                'nomor_monitoring' => 'MON-2026-009',
                'tanggal_monitoring' => '2026-05-15',
                'proyek_id' => 2,
                'pegawai_id' => 4,
                'tahapan_pekerjaan' => 'Pemasangan Kusen',
                'detail_tugas' => 'Pemasangan pintu dan jendela aluminium',
                'tanggal_selesai' => '2026-06-01',
                'status' => 'Dalam Progress',
                'progress' => 70,
                'keterangan' => 'Kusen sudah terpasang 70%',
            ],
            [
                'nomor_monitoring' => 'MON-2026-010',
                'tanggal_monitoring' => '2026-05-25',
                'proyek_id' => 3,
                'pegawai_id' => 2,
                'tahapan_pekerjaan' => 'Pemasangan Atap',
                'detail_tugas' => 'Pemasangan rangka atap dan penutup genteng',
                'tanggal_selesai' => '2026-06-10',
                'status' => 'Dalam Progress',
                'progress' => 60,
                'keterangan' => 'Rangka atap selesai, menunggu genteng',
            ],
            [
                'nomor_monitoring' => 'MON-2026-011',
                'tanggal_monitoring' => '2026-06-01',
                'proyek_id' => 1,
                'pegawai_id' => 3,
                'tahapan_pekerjaan' => 'Instalasi Listrik',
                'detail_tugas' => 'Pemasangan kabel dan saklar',
                'tanggal_selesai' => '2026-06-15',
                'status' => 'Menunggu',
                'progress' => 0,
                'keterangan' => 'Material sudah diorder',
            ],
            [
                'nomor_monitoring' => 'MON-2026-012',
                'tanggal_monitoring' => '2026-06-05',
                'proyek_id' => 2,
                'pegawai_id' => 1,
                'tahapan_pekerjaan' => 'Finishing Interior',
                'detail_tugas' => 'Pemasangan plafon dan lantai',
                'tanggal_selesai' => '2026-06-25',
                'status' => 'Menunggu',
                'progress' => 0,
                'keterangan' => 'Menunggu finishing exterior selesai',
            ],
        ];

        foreach ($monitorings as $monitoring) {
            Monitoring::create($monitoring);
        }
    }
}