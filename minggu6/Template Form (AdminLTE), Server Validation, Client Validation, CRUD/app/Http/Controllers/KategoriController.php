<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Http\Requests\StorePostRequest;
use App\Models\KategoriModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $valildate = $request->validated();

        $valildate = $request->safe()->only('kategori_kode', 'kategori_nama');
        $valildate = $request->safe()->except('kategori_kode', 'kategori_nama');

        KategoriModel::create([
            'kategori_kode' => $request->kode_kategori,
            'kategori_nama' => $request->nama_kategori
        ]);
        return redirect('/kategori');
    }

    public function edit($id)
    {
        $kategori = KategoriModel::findOrFail($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request)
    {
        $kategori = KategoriModel::findOrFail($request->kategori_id);
        $kategori->kategori_kode = $request->kode_kategori;
        $kategori->kategori_nama = $request->nama_kategori;
        $kategori->save();

        return redirect('/kategori');
    }

    public function delete($id)
    {
        $kategori = KategoriModel::findOrFail($id);
        $kategori->delete();

        return redirect('/kategori');
    }
}
