<?php

namespace Database\Seeders;

use App\Models\Biaya;
use Illuminate\Database\Seeder;

class BiayaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $biayas = [
            [
                'kode' => 'B001',
                'nama' => 'Semen',
                'deskripsi' => 'Semen untuk konstruksi bangunan',
                'harga' => 75000,
            ],
            [
                'kode' => 'B002',
                'nama' => 'Besi Beton',
                'deskripsi' => 'Besi tulangan untuk struktur beton',
                'harga' => 150000,
            ],
            [
                'kode' => 'B003',
                'nama' => 'Pasir',
                'deskripsi' => 'Pasir halus untuk adukan mortar',
                'harga' => 250000,
            ],
            [
                'kode' => 'B004',
                'nama' => 'Batu Bata',
                'deskripsi' => 'Batu bata merah untuk dinding',
                'harga' => 500,
            ],
            [
                'kode' => 'B005',
                'nama' => 'Kayu Balok',
                'deskripsi' => 'Kayu jati untuk bekisting',
                'harga' => 350000,
            ],
            [
                'kode' => 'B006',
                'nama' => 'Pipa PVC 4 inch',
                'deskripsi' => 'Pipa saluran air ukuran 4 inch',
                'harga' => 85000,
            ],
            [
                'kode' => 'B007',
                'nama' => 'Keramik 40x40',
                'deskripsi' => 'Keramik lantai ukuran 40x40 cm',
                'harga' => 55000,
            ],
            [
                'kode' => 'B008',
                'nama' => 'Cat Dinding',
                'deskripsi' => 'Cat tembok untuk finishing interior',
                'harga' => 125000,
            ],
            [
                'kode' => 'B009',
                'nama' => 'Kusen Pintu Aluminium',
                'deskripsi' => 'Kusen aluminium untuk pintu',
                'harga' => 450000,
            ],
            [
                'kode' => 'B010',
                'nama' => 'Paku',
                'deskripsi' => 'Paku berbagai ukuran',
                'harga' => 25000,
            ],
            [
                'kode' => 'B011',
                'nama' => 'Baut dan Mur',
                'deskripsi' => 'Set baut mur untuk struktur',
                'harga' => 35000,
            ],
            [
                'kode' => 'B012',
                'nama' => 'Kaca Tempered',
                'deskripsi' => 'Kaca tempered untuk jendela',
                'harga' => 250000,
            ],
        ];

        foreach ($biayas as $biaya) {
            Biaya::create($biaya);
        }
    }
}