<?php

namespace Database\Seeders;

use App\Models\PengeluaranDana;
use App\Models\PengeluaranDanaDetail;
use App\Models\Proyek;
use App\Models\Pegawai;
use App\Models\Biaya;
use Illuminate\Database\Seeder;

class PengeluaranDanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pengeluarans = [
            [
                'nota' => 'NOTA-2026-001',
                'tanggal' => '2026-01-15',
                'proyek_id' => 1,
                'pegawai_id' => 1,
                'keterangan' => 'Pembelian material dan tools untuk proyek pembangunan rumah',
                'details' => [
                    ['biaya_id' => 1, 'kode' => 'B-001', 'nama' => 'Material Proyek', 'harga' => 1500000, 'jumlah' => 5],
                    ['biaya_id' => 2, 'kode' => 'B-002', 'nama' => 'Tools', 'harga' => 500000, 'jumlah' => 3],
                ]
            ],
            [
                'nota' => 'NOTA-2026-002',
                'tanggal' => '2026-02-20',
                'proyek_id' => 2,
                'pegawai_id' => 2,
                'keterangan' => 'Biaya transportasi dan uang makan tenaga kerja',
                'details' => [
                    ['biaya_id' => 3, 'kode' => 'B-003', 'nama' => 'Transport', 'harga' => 300000, 'jumlah' => 4],
                    ['biaya_id' => 4, 'kode' => 'B-004', 'nama' => 'Uang Makan', 'harga' => 100000, 'jumlah' => 10],
                ]
            ],
            [
                'nota' => 'NOTA-2026-003',
                'tanggal' => '2026-03-10',
                'proyek_id' => 1,
                'pegawai_id' => 3,
                'keterangan' => 'Pembelian bahan bangunan dan biaya listrik proyek',
                'details' => [
                    ['biaya_id' => 5, 'kode' => 'B-005', 'nama' => 'Bahan Bangunan', 'harga' => 2500000, 'jumlah' => 2],
                    ['biaya_id' => 1, 'kode' => 'B-001', 'nama' => 'Material Proyek', 'harga' => 1500000, 'jumlah' => 3],
                    ['biaya_id' => 6, 'kode' => 'B-006', 'nama' => 'Listrik', 'harga' => 750000, 'jumlah' => 1],
                ]
            ],
            [
                'nota' => 'NOTA-2026-004',
                'tanggal' => '2026-04-05',
                'proyek_id' => 3,
                'pegawai_id' => 1,
                'keterangan' => 'Pengadaan tools dan biaya transportasi lapangan',
                'details' => [
                    ['biaya_id' => 2, 'kode' => 'B-002', 'nama' => 'Tools', 'harga' => 500000, 'jumlah' => 6],
                    ['biaya_id' => 3, 'kode' => 'B-003', 'nama' => 'Transport', 'harga' => 300000, 'jumlah' => 5],
                ]
            ],
            [
                'nota' => 'NOTA-2026-005',
                'tanggal' => '2026-05-18',
                'proyek_id' => 2,
                'pegawai_id' => 4,
                'keterangan' => 'Biaya makan harian dan pembelian bahan listrik',
                'details' => [
                    ['biaya_id' => 4, 'kode' => 'B-004', 'nama' => 'Uang Makan', 'harga' => 100000, 'jumlah' => 15],
                    ['biaya_id' => 5, 'kode' => 'B-005', 'nama' => 'Bahan Bangunan', 'harga' => 2500000, 'jumlah' => 1],
                    ['biaya_id' => 6, 'kode' => 'B-006', 'nama' => 'Listrik', 'harga' => 750000, 'jumlah' => 2],
                ]
            ],
        ];

        foreach ($pengeluarans as $data) {
            $details = $data['details'];
            unset($data['details']);
            
            // Calculate total
            $total = 0;
            foreach ($details as $detail) {
                $total += $detail['harga'] * $detail['jumlah'];
            }
            $data['total'] = $total;

            $pengeluaran = PengeluaranDana::create($data);

            foreach ($details as $detail) {
                PengeluaranDanaDetail::create([
                    'pengeluaran_dana_id' => $pengeluaran->id,
                    'biaya_id' => $detail['biaya_id'],
                    'kode' => $detail['kode'],
                    'nama' => $detail['nama'],
                    'harga' => $detail['harga'],
                    'jumlah' => $detail['jumlah'],
                    'total' => $detail['harga'] * $detail['jumlah'],
                ]);
            }
        }
    }
}