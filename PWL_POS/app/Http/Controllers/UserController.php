<?php

namespace App\Http\Controllers;

use App\DataTables\UserDataTable;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Js;

class UserController extends Controller
{
    public function index(UserDataTable $dataTable)
    {
        return $dataTable->render('user.index');
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        UserModel::create([
            'level_id' => $request->level_id,
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
        ]);
        return redirect('/user');
    }

    public function edit($id)
    {
        $user = UserModel::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = UserModel::findOrFail($request->user_id);
        $user->level_id = $request->level_id;
        $user->username = $request->username;
        $user->nama = $request->nama;
        if ($request->password != "") {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect('/user');
    }

    public function delete($id)
    {
        $user = UserModel::findOrFail($id);
        $user->delete();

        return redirect('/user');
    }
}
