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
                'jumlah_pembayaran' => 400000,
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Ani',
                'penjualan_kode' => '20250102',
                'penjualan_tanggal' => '2025-01-02',
                'jumlah_pembayaran' => 400000,
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Citra',
                'penjualan_kode' => '20250103',
                'penjualan_tanggal' => '2025-01-03',
                'jumlah_pembayaran' => 400000,
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Dodi',
                'penjualan_kode' => '20250104',
                'penjualan_tanggal' => '2025-01-04',
                'jumlah_pembayaran' => 400000,
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Eka',
                'penjualan_kode' => '20250105',
                'penjualan_tanggal' => '2025-01-05',
                'jumlah_pembayaran' => 400000,
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Fajar',
                'penjualan_kode' => '20250106',
                'penjualan_tanggal' => '2025-01-06',
                'jumlah_pembayaran' => 400000,
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Galih',
                'penjualan_kode' => '20250107',
                'penjualan_tanggal' => '2025-01-07',
                'jumlah_pembayaran' => 400000,
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Hani',
                'penjualan_kode' => '20250108',
                'penjualan_tanggal' => '2025-01-08',
                'jumlah_pembayaran' => 400000,
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Indah',
                'penjualan_kode' => '20250109',
                'penjualan_tanggal' => '2025-01-09',
                'jumlah_pembayaran' => 400000,
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Joko',
                'penjualan_kode' => '20250110',
                'penjualan_tanggal' => '2025-01-10',
                'jumlah_pembayaran' => 400000,
            ],
        ]);
    }
}
