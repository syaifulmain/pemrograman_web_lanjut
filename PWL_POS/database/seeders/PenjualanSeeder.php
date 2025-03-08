<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t_penjualan')->insert([
            [
                'user_id' => 3,
                'pembeli' => 'Budi',
                'penjualan_kode' => '20250101',
                'penjualan_tanggal' => '2025-01-01',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Ani',
                'penjualan_kode' => '20250102',
                'penjualan_tanggal' => '2025-01-02',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Citra',
                'penjualan_kode' => '20250103',
                'penjualan_tanggal' => '2025-01-03',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Dodi',
                'penjualan_kode' => '20250104',
                'penjualan_tanggal' => '2025-01-04',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Eka',
                'penjualan_kode' => '20250105',
                'penjualan_tanggal' => '2025-01-05',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Fajar',
                'penjualan_kode' => '20250106',
                'penjualan_tanggal' => '2025-01-06',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Galih',
                'penjualan_kode' => '20250107',
                'penjualan_tanggal' => '2025-01-07',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Hani',
                'penjualan_kode' => '20250108',
                'penjualan_tanggal' => '2025-01-08',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Indah',
                'penjualan_kode' => '20250109',
                'penjualan_tanggal' => '2025-01-09',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Joko',
                'penjualan_kode' => '20250110',
                'penjualan_tanggal' => '2025-01-10',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Kiki',
                'penjualan_kode' => '20250111',
                'penjualan_tanggal' => '2025-01-11',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Lia',
                'penjualan_kode' => '20250112',
                'penjualan_tanggal' => '2025-01-12',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Mira',
                'penjualan_kode' => '20250113',
                'penjualan_tanggal' => '2025-01-13',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Nina',
                'penjualan_kode' => '20250114',
                'penjualan_tanggal' => '2025-01-14',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Oki',
                'penjualan_kode' => '20250115',
                'penjualan_tanggal' => '2025-01-15',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Puput',
                'penjualan_kode' => '20250116',
                'penjualan_tanggal' => '2025-01-16',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Qori',
                'penjualan_kode' => '20250117',
                'penjualan_tanggal' => '2025-01-17',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Rina',
                'penjualan_kode' => '20250118',
                'penjualan_tanggal' => '2025-01-18',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Sari',
                'penjualan_kode' => '20250119',
                'penjualan_tanggal' => '2025-01-19',
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Tono',
                'penjualan_kode' => '20250120',
                'penjualan_tanggal' => '2025-01-20',
            ]
        ]);
    }
}
