<?php

namespace App\Http\Controllers;

use App\DataTables\BarangDataTable;
use App\Models\BarangModel;
use App\Models\KategoriModel;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(BarangDataTable $dataTable)
    {
        return $dataTable->render('barang.index');
    }

    public function create()
    {
        $kategori = KategoriModel::all();
        return view('barang.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        BarangModel::create([
            'barang_kode' => $request->barang_kode,
            'barang_nama' => $request->barang_nama,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
            'kategori_id' => $request->kategori_id,
        ]);
        return redirect('/barang');
    }

    public function edit($id)
    {
        $barang = BarangModel::findOrFail($id);
        $kategori = KategoriModel::all();
        return view('barang.edit', compact('barang', 'kategori'));
    }

    public function update(Request $request)
    {
        $barang = BarangModel::findOrFail($request->barang_id);
        $barang->barang_kode = $request->barang_kode;
        $barang->barang_nama = $request->barang_nama;
        $barang->harga_beli = $request->harga_beli;
        $barang->harga_jual = $request->harga_jual;
        $barang->kategori_id = $request->kategori_id;
        $barang->save();

        return redirect('/barang');
    }

    public function delete($id)
    {
        $barang = BarangModel::findOrFail($id);
        $barang->delete();

        return redirect('/barang');
    }
}
