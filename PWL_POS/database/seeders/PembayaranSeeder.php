<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('t_pembayaran')->insert([
            ['penjualan_id' => 1, 'jumlah_bayar' => 500000],
            ['penjualan_id' => 2, 'jumlah_bayar' => 300000],
            ['penjualan_id' => 3, 'jumlah_bayar' => 200000],
            ['penjualan_id' => 4, 'jumlah_bayar' => 100000],
            ['penjualan_id' => 5, 'jumlah_bayar' => 400000],
            ['penjualan_id' => 6, 'jumlah_bayar' => 600000],
            ['penjualan_id' => 7, 'jumlah_bayar' => 700000],
            ['penjualan_id' => 8, 'jumlah_bayar' => 800000],
            ['penjualan_id' => 9, 'jumlah_bayar' => 900000],
            ['penjualan_id' => 10, 'jumlah_bayar' => 1000000],
        ]);
    }
}
