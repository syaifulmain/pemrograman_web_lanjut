<?php

namespace App\Http\Controllers;

use App\DataTables\PenjualanDataTable;
use App\Models\BarangModel;
use App\Models\PenjualanDetailModel;
use App\Models\PenjualanModel;
use App\Models\UserModel;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index(PenjualanDataTable $dataTable)
    {
        return $dataTable->render('penjualan.index');
    }

    public function create()
    {
        $users = UserModel::all();
        $barangs = BarangModel::all();
        return view('penjualan.create', compact('users', 'barangs'));
    }

    public function store(Request $request)
    {
        $penjualan = PenjualanModel::create([
            'penjualan_kode' => $request->penjualan_kode,
            'pembeli' => $request->pembeli,
            'penjualan_tanggal' => $request->penjualan_tanggal,
            'user_id' => $request->user_id,
        ]);

        $penjualan_id = $penjualan->penjualan_id;

        for ($i = 0; $i < count($request->jumlah); $i++) {
            PenjualanDetailModel::create([
                'penjualan_id' => $penjualan_id,
                'barang_id' => $request->barang_id[$i],
                'jumlah' => $request->jumlah[$i],
                'harga' => $request->harga[$i],
            ]);
        }

        return redirect('/penjualan');
    }

    public function detail($id)
    {
        $penjualan = PenjualanModel::where('penjualan_id', $id)->with('penjualanDetail')->with('penjualanDetail.barang')->with('user')->first();
        return view('penjualan.detail.index', compact('penjualan'));
    }

    public function delete($id)
    {
        $penjualan = PenjualanModel::findOrFail($id);
        $penjualan->delete();

        return redirect('/penjualan');
    }
}
