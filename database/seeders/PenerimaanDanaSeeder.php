<?php

namespace Database\Seeders;

use App\Models\PenerimaanDana;
use App\Models\Proyek;
use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class PenerimaanDanaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proyeks = Proyek::all();
        $pegawais = Pegawai::all();

        if ($proyeks->isEmpty() || $pegawais->isEmpty()) {
            $this->command->warn('Proyek atau Pegawai belum ada. Harap jalankan seeder lain terlebih dahulu.');
            return;
        }

        $data = [
            [
                'no_kwitansi' => 'KW-001/2026',
                'tanggal' => '2026-06-01',
                'proyek_id' => $proyeks->random()->id,
                'pegawai_id' => $pegawais->random()->id,
                'dana_diterima' => 15000000,
                'keterangan' => 'Penerimaan dana tahap 1 untuk pembelian material',
            ],
            [
                'no_kwitansi' => 'KW-002/2026',
                'tanggal' => '2026-06-03',
                'proyek_id' => $proyeks->random()->id,
                'pegawai_id' => $pegawais->random()->id,
                'dana_diterima' => 25000000,
                'keterangan' => 'Penerimaan dana tahap 2 untuk upah tenaga kerja',
            ],
            [
                'no_kwitansi' => 'KW-003/2026',
                'tanggal' => '2026-06-05',
                'proyek_id' => $proyeks->random()->id,
                'pegawai_id' => $pegawais->random()->id,
                'dana_diterima' => 10000000,
                'keterangan' => 'Penerimaan dana untuk sewa alat berat',
            ],
            [
                'no_kwitansi' => 'KW-004/2026',
                'tanggal' => '2026-06-07',
                'proyek_id' => $proyeks->random()->id,
                'pegawai_id' => $pegawais->random()->id,
                'dana_diterima' => 35000000,
                'keterangan' => 'Penerimaan dana tahap 3 untuk penyelesaian proyek',
            ],
            [
                'no_kwitansi' => 'KW-005/2026',
                'tanggal' => '2026-06-08',
                'proyek_id' => $proyeks->random()->id,
                'pegawai_id' => $pegawais->random()->id,
                'dana_diterima' => 20000000,
                'keterangan' => 'Penerimaan dana untuk pembelian besi beton',
            ],
            [
                'no_kwitansi' => 'KW-006/2026',
                'tanggal' => '2026-06-09',
                'proyek_id' => $proyeks->random()->id,
                'pegawai_id' => $pegawais->random()->id,
                'dana_diterima' => 18000000,
                'keterangan' => 'Penerimaan dana untuk semen dan pasir',
            ],
            [
                'no_kwitansi' => 'KW-007/2026',
                'tanggal' => '2026-06-10',
                'proyek_id' => $proyeks->random()->id,
                'pegawai_id' => $pegawais->random()->id,
                'dana_diterima' => 22000000,
                'keterangan' => 'Penerimaan dana untuk finishing dan cat',
            ],
            [
                'no_kwitansi' => 'KW-008/2026',
                'tanggal' => '2026-06-11',
                'proyek_id' => $proyeks->random()->id,
                'pegawai_id' => $pegawais->random()->id,
                'dana_diterima' => 30000000,
                'keterangan' => 'Penerimaan dana tahap akhir pembangunan',
            ],
            [
                'no_kwitansi' => 'KW-009/2026',
                'tanggal' => '2026-06-11',
                'proyek_id' => $proyeks->random()->id,
                'pegawai_id' => $pegawais->random()->id,
                'dana_diterima' => 12500000,
                'keterangan' => 'Penerimaan dana untuk biaya transportasi',
            ],
            [
                'no_kwitansi' => 'KW-010/2026',
                'tanggal' => '2026-06-12',
                'proyek_id' => $proyeks->random()->id,
                'pegawai_id' => $pegawais->random()->id,
                'dana_diterima' => 27500000,
                'keterangan' => 'Penerimaan dana untuk installasi listrik',
            ],
            [
                'no_kwitansi' => 'KW-011/2026',
                'tanggal' => '2026-06-12',
                'proyek_id' => $proyeks->random()->id,
                'pegawai_id' => $pegawais->random()->id,
                'dana_diterima' => 16000000,
                'keterangan' => 'Penerimaan dana untuk pipa dan sanitasi',
            ],
            [
                'no_kwitansi' => 'KW-012/2026',
                'tanggal' => '2026-06-12',
                'proyek_id' => $proyeks->random()->id,
                'pegawai_id' => $pegawais->random()->id,
                'dana_diterima' => 40000000,
                'keterangan' => 'Penerimaan dana untuk pembelian keramik',
            ],
        ];

        foreach ($data as $item) {
            PenerimaanDana::create($item);
        }
    }
}