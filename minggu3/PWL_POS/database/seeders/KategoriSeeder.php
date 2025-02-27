<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('m_kategori')->insert([
            ['kategori_kode' => 'KAT001', 'kategori_nama' => 'Kategori 1'],
            ['kategori_kode' => 'KAT002', 'kategori_nama' => 'Kategori 2'],
            ['kategori_kode' => 'KAT003', 'kategori_nama' => 'Kategori 3'],
            ['kategori_kode' => 'KAT004', 'kategori_nama' => 'Kategori 4'],
            ['kategori_kode' => 'KAT005', 'kategori_nama' => 'Kategori 5'],
        ]);
    }
}
