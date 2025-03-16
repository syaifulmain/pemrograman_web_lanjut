<?php

namespace App\Http\Controllers;

use App\DataTables\PenjualanDataTable;
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
        return view('penjualan.create', compact('users'));
    }

    public function store(Request $request)
    {
        PenjualanModel::create([
            'penjualan_kode' => $request->penjualan_kode,
            'pembeli' => $request->pembeli,
            'penjualan_tanggal' => $request->penjualan_tanggal,
            'user_id' => $request->user_id,
        ]);
        return redirect('/penjualan');
    }

    public function edit($id)
    {
        $penjualan = PenjualanModel::findOrFail($id);
        $users = UserModel::all();
        return view('penjualan.edit', compact('penjualan', 'users'));
    }

    public function update(Request $request)
    {
        $penjualan = PenjualanModel::findOrFail($request->penjualan_id);
        $penjualan->penjualan_kode = $request->penjualan_kode;
        $penjualan->pembeli = $request->pembeli;
        $penjualan->penjualan_tanggal = $request->penjualan_tanggal;
        $penjualan->user_id = $request->user_id;
        $penjualan->save();

        return redirect('/penjualan');
    }

    public function delete($id)
    {
        $penjualan = PenjualanModel::findOrFail($id);
        $penjualan->delete();

        return redirect('/penjualan');
    }
}
