<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BarangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BarangController extends Controller
{
    public function index()
    {
        // Ambil semua data barang
        $barang = BarangModel::all();

        return response()->json([
            'success' => true,
            'data' => $barang,
        ], 200);
    }
    public function store(Request $request)
    {
//        sel validation
        $validator = Validator::make($request->all(), [
            'barang_kode' => 'required',
            'barang_nama' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            'kategori_id' => 'required',
            'image' => 'required'
        ]);

//        if validation fails
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

//        create barang
        $barang = BarangModel::create([
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request->barang_nama,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'kategori_id' => $request->kategori_id,
            'image' => $request->image->hashName(),
        ]);

//        return response JSON barang is created
        if ($barang) {
            return response()->json([
                'success' => true,
                'barang' => $barang,
            ], 201);
        }

//        return JSON procces insert failed
        return response()->json([
            'success' => false,

        ], 409);
    }
}
