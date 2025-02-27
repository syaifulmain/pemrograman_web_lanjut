<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        $now = Carbon::now();
        DB::table('t_penjualan')->insert([
            ['user_id' => 1, 'pembeli' => 'Pembeli 1', 'penjualan_kode' => 'PJ001', 'penjualan_tanggal' => $now],
            ['user_id' => 1, 'pembeli' => 'Pembeli 2', 'penjualan_kode' => 'PJ002', 'penjualan_tanggal' => $now],
            ['user_id' => 1, 'pembeli' => 'Pembeli 3', 'penjualan_kode' => 'PJ003', 'penjualan_tanggal' => $now],
            ['user_id' => 1, 'pembeli' => 'Pembeli 4', 'penjualan_kode' => 'PJ004', 'penjualan_tanggal' => $now],
            ['user_id' => 1, 'pembeli' => 'Pembeli 5', 'penjualan_kode' => 'PJ005', 'penjualan_tanggal' => $now],
            ['user_id' => 1, 'pembeli' => 'Pembeli 6', 'penjualan_kode' => 'PJ006', 'penjualan_tanggal' => $now],
            ['user_id' => 1, 'pembeli' => 'Pembeli 7', 'penjualan_kode' => 'PJ007', 'penjualan_tanggal' => $now],
            ['user_id' => 1, 'pembeli' => 'Pembeli 8', 'penjualan_kode' => 'PJ008', 'penjualan_tanggal' => $now],
            ['user_id' => 1, 'pembeli' => 'Pembeli 9', 'penjualan_kode' => 'PJ009', 'penjualan_tanggal' => $now],
            ['user_id' => 1, 'pembeli' => 'Pembeli 10', 'penjualan_kode' => 'PJ010', 'penjualan_tanggal' => $now],
        ]);
    }
}
