<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'supplier_kode' => 'SUP-101',
                'supplier_nama' => 'PT Maju Bersama',
                'supplier_alamat' => 'Jl. Kebangkitan No. 15, Jakarta',
                'supplier_telepon' => '021-98765432',
            ],
            [
                'supplier_kode' => 'SUP-102',
                'supplier_nama' => 'CV Makmur Sentosa',
                'supplier_alamat' => 'Jl. Pahlawan No. 25, Surabaya',
                'supplier_telepon' => '031-87654321',
            ],
            [
                'supplier_kode' => 'SUP-103',
                'supplier_nama' => 'UD Harmoni',
                'supplier_alamat' => 'Jl. Raya No. 50, Bandung',
                'supplier_telepon' => '022-76543210',
            ],
        ];
        DB::table('m_supplier')->insert($data);
    }
}
