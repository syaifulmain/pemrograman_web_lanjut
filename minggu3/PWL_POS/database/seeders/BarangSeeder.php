<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_barang')->insert([
            ['kategori_id' => 1, 'barang_kode' => 'BRG001', 'barang_nama' => 'Barang 1', 'harga_beli' => 10000, 'harga_jual' => 15000],
            ['kategori_id' => 1, 'barang_kode' => 'BRG002', 'barang_nama' => 'Barang 2', 'harga_beli' => 20000, 'harga_jual' => 25000],
            ['kategori_id' => 2, 'barang_kode' => 'BRG003', 'barang_nama' => 'Barang 3', 'harga_beli' => 30000, 'harga_jual' => 35000],
            ['kategori_id' => 2, 'barang_kode' => 'BRG004', 'barang_nama' => 'Barang 4', 'harga_beli' => 40000, 'harga_jual' => 45000],
            ['kategori_id' => 3, 'barang_kode' => 'BRG005', 'barang_nama' => 'Barang 5', 'harga_beli' => 50000, 'harga_jual' => 55000],
            ['kategori_id' => 3, 'barang_kode' => 'BRG006', 'barang_nama' => 'Barang 6', 'harga_beli' => 60000, 'harga_jual' => 65000],
            ['kategori_id' => 4, 'barang_kode' => 'BRG007', 'barang_nama' => 'Barang 7', 'harga_beli' => 70000, 'harga_jual' => 75000],
            ['kategori_id' => 4, 'barang_kode' => 'BRG008', 'barang_nama' => 'Barang 8', 'harga_beli' => 80000, 'harga_jual' => 85000],
            ['kategori_id' => 5, 'barang_kode' => 'BRG009', 'barang_nama' => 'Barang 9', 'harga_beli' => 90000, 'harga_jual' => 95000],
            ['kategori_id' => 5, 'barang_kode' => 'BRG010', 'barang_nama' => 'Barang 10', 'harga_beli' => 100000, 'harga_jual' => 105000],
        ]);
    }
}
