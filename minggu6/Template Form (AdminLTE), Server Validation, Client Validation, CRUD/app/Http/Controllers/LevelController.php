<?php

namespace App\Http\Controllers;

use App\DataTables\LevelDataTable;
use App\Http\Requests\StorePostRequest;
use App\Models\LevelModel;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function index(LevelDataTable $dataTable)
    {
        return $dataTable->render('level.index');
    }

    public function create()
    {
        return view('level.create');
    }

    public function store(StorePostRequest $request): RedirectResponse
    {

        $valildate = $request->validated();

        $valildate = $request->safe()->only('level_kode', 'level_nama');
        $valildate = $request->safe()->except('level_kode', 'level_nama');

        LevelModel::create([
            'level_kode' => $request->kodeLevel,
            'level_nama' => $request->namaLevel
        ]);
        return redirect('/level');
    }

    public function edit($id)
    {
        $level = LevelModel::findOrFail($id);
        return view('level.edit', compact('level'));
    }

    public function update(Request $request)
    {
        $level = LevelModel::findOrFail($request->level_id);
        $level->level_kode = $request->kodeLevel;
        $level->level_nama = $request->namaLevel;
        $level->save();

        return redirect('/level');
    }

    public function delete($id)
    {
        $level = LevelModel::findOrFail($id);
        $level->delete();

        return redirect('/level');
    }
}
