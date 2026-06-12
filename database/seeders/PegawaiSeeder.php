<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pegawais = [
            [
                'nama' => 'Ahmad Wijaya',
                'telp' => '081234567890',
                'tanggal_bekerja' => '2020-01-15',
            ],
            [
                'nama' => 'Siti Nurhaliza',
                'telp' => '081234567891',
                'tanggal_bekerja' => '2020-03-22',
            ],
            [
                'nama' => 'Budi Santoso',
                'telp' => '081234567892',
                'tanggal_bekerja' => '2020-06-10',
            ],
            [
                'nama' => 'Dewi Lestari',
                'telp' => '081234567893',
                'tanggal_bekerja' => '2021-02-01',
            ],
            [
                'nama' => 'Eko Prasetyo',
                'telp' => '081234567894',
                'tanggal_bekerja' => '2021-05-18',
            ],
            [
                'nama' => 'Fitri Handayani',
                'telp' => '081234567895',
                'tanggal_bekerja' => '2021-08-25',
            ],
            [
                'nama' => 'Gunawan Hidayat',
                'telp' => '081234567896',
                'tanggal_bekerja' => '2022-01-10',
            ],
            [
                'nama' => 'Hesti Rahayu',
                'telp' => '081234567897',
                'tanggal_bekerja' => '2022-04-05',
            ],
            [
                'nama' => 'Irfan Hakim',
                'telp' => '081234567898',
                'tanggal_bekerja' => '2022-07-20',
            ],
            [
                'nama' => 'Jasmine Putri',
                'telp' => '081234567899',
                'tanggal_bekerja' => '2023-01-12',
            ],
            [
                'nama' => 'Kurniawan Adi',
                'telp' => '081234567800',
                'tanggal_bekerja' => '2023-03-28',
            ],
            [
                'nama' => 'Lina Marlina',
                'telp' => '081234567801',
                'tanggal_bekerja' => '2023-06-15',
            ],
        ];

        foreach ($pegawais as $pegawai) {
            Pegawai::create($pegawai);
        }
    }
}