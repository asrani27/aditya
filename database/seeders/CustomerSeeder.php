<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $customers = [
            [
                'kode_customer' => 'CUST001',
                'nama_customer' => 'PT. Maju Bersama',
                'alamat' => 'Jl. Sudirman No. 123, Jakarta Selatan',
                'telepon' => '0212345678',
                'email' => 'info@majubersama.co.id',
                'pic' => 'Budi Santoso',
                'keterangan' => 'Customer tetap',
            ],
            [
                'kode_customer' => 'CUST002',
                'nama_customer' => 'CV. Sumber Rejeki',
                'alamat' => 'Jl. Gatot Subroto No. 45, Bandung',
                'telepon' => '0227654321',
                'email' => 'contact@sumberrejeki.com',
                'pic' => 'Siti Nurhaliza',
                'keterangan' => 'Customer baru',
            ],
            [
                'kode_customer' => 'CUST003',
                'nama_customer' => 'PT. Berkah Sejahtera',
                'alamat' => 'Jl. Ahmad Yani No. 78, Surabaya',
                'telepon' => '0319876543',
                'email' => 'admin@berkahsejahtera.co.id',
                'pic' => 'Ahmad Wijaya',
                'keterangan' => 'Customer prioritas',
            ],
            [
                'kode_customer' => 'CUST004',
                'nama_customer' => 'Toko Elektronik Jaya',
                'alamat' => 'Jl. Braga No. 56, Bandung',
                'telepon' => '0223456789',
                'email' => 'jaya.elektronik@mail.com',
                'pic' => 'Dewi Lestari',
                'keterangan' => null,
            ],
            [
                'kode_customer' => 'CUST005',
                'nama_customer' => 'PT. Konstruksi Indonesia',
                'alamat' => 'Jl. Thamrin No. 90, Jakarta Pusat',
                'telepon' => '0215678901',
                'email' => 'konstruksi@indonesia.co.id',
                'pic' => 'Eko Prasetyo',
                'keterangan' => 'Proyek besar',
            ],
            [
                'kode_customer' => 'CUST006',
                'nama_customer' => 'CV. Bangun Persada',
                'alamat' => 'Jl. Diponegoro No. 34, Semarang',
                'telepon' => '0242345678',
                'email' => 'bangunpersada@gmail.com',
                'pic' => 'Fitri Handayani',
                'keterangan' => null,
            ],
            [
                'kode_customer' => 'CUST007',
                'nama_customer' => 'PT. Energi Terbarukan',
                'alamat' => 'Jl. Pangeran Diponegoro No. 12, Yogyakarta',
                'telepon' => '0274123456',
                'email' => 'info@energiterbarukan.co.id',
                'pic' => 'Gunawan Hidayat',
                'keterangan' => 'Customer hijau',
            ],
            [
                'kode_customer' => 'CUST008',
                'nama_customer' => 'Apotek Sehat Farma',
                'alamat' => 'Jl. Asia Afrika No. 88, Bandung',
                'telepon' => '0228765432',
                'email' => 'apoteksehatfarma@mail.com',
                'pic' => 'Hesti Rahayu',
                'keterangan' => null,
            ],
            [
                'kode_customer' => 'CUST009',
                'nama_customer' => 'PT. Properti Harmoni',
                'alamat' => 'Jl. Kebayoran Lama No. 55, Jakarta Selatan',
                'telepon' => '0213456789',
                'email' => 'harmoni@properti.co.id',
                'pic' => 'Irfan Hakim',
                'keterangan' => 'Proyek properti',
            ],
            [
                'kode_customer' => 'CUST010',
                'nama_customer' => 'CV. Karya Mandiri',
                'alamat' => 'Jl. Gajah Mada No. 67, Malang',
                'telepon' => '0341567890',
                'email' => 'karya.mandiri@gmail.com',
                'pic' => 'Jasmine Putri',
                'keterangan' => null,
            ],
            [
                'kode_customer' => 'CUST011',
                'nama_customer' => 'PT. Teknologi Cerdas',
                'alamat' => 'Jl. HR Rasuna Said No. 23, Jakarta Selatan',
                'telepon' => '0216789012',
                'email' => 'teknologi.cerdas@tech.co.id',
                'pic' => 'Kurniawan Adi',
                'keterangan' => 'Startup teknologi',
            ],
            [
                'kode_customer' => 'CUST012',
                'nama_customer' => 'Restoran Sedap Mantap',
                'alamat' => 'Jl. Dago No. 99, Bandung',
                'telepon' => '0229012345',
                'email' => 'sedapmantap@restaurant.com',
                'pic' => 'Lina Marlina',
                'keterangan' => 'F&B industry',
            ],
        ];

        foreach ($customers as $customer) {
            Customer::create($customer);
        }
    }
}
