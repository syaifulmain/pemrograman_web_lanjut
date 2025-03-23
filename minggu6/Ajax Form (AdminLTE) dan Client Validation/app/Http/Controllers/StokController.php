<?php

namespace App\Http\Controllers;

use App\DataTables\StokDataTable;
use App\Models\BarangModel;
use App\Models\StokModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StokController extends Controller
{
    public function index(StokDataTable $dataTable)
    {
        return $dataTable->render('stok.index');
    }

    public function create()
    {
        $barangs = BarangModel::all();
        $users = UserModel::all();
        return view('stok.create', compact('barangs', 'users'));
    }

    public function store(Request $request)
    {
        StokModel::create([
            'barang_id' => $request->barang_id,
            'user_id' => $request->user_id,
            'stok_tanggal' => $request->stok_tanggal,
            'stok_jumlah' => $request->stok_jumlah,
        ]);
        return redirect('/stok');
    }

    public function edit($id)
    {
        $stok = StokModel::findOrFail($id);
        $barangs = BarangModel::all();
        $users = UserModel::all();
        return view('stok.edit', compact('stok', 'barangs', 'users'));
    }

    public function update(Request $request)
    {
        $stok = StokModel::findOrFail($request->stok_id);
        $stok->barang_id = $request->barang_id;
        $stok->user_id = $request->user_id;
        $stok->stok_tanggal = $request->stok_tanggal;
        $stok->stok_jumlah = $request->stok_jumlah;
        $stok->save();

        return redirect('/stok');
    }

    public function delete($id)
    {
        $stok = StokModel::findOrFail($id);
        $stok->delete();

        return redirect('/stok');
    }
}
