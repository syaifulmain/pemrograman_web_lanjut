<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
//         $data = [
//             'username' => 'customer-1',
//             'nama' => 'Pelanggan',
//             'password' => Hash::make('12345'),
//             'level_id' => 4
//         ];
//         UserModel::insert($data);

//        $data = [
//            'nama' => 'Pelanggan Pertama'
//        ];
//        UserModel::where('username', 'customer-1')->update($data);

//         JS4: Praktikum 1
//        $data = [
//            'level_id' => 2,
////             'username' => 'manager_dua',
////             'nama' => 'Manager 2',
//            'username' => 'manager_tiga',
//            'nama' => 'Manager 3',
//            'password' => Hash::make('12345')
//        ];
//        UserModel::create($data);
//
//        $user = UserModel::all();
//        return view('user', ['data' => $user]);

//        JS: Praktikum 2.1
//        $user = UserModel::find(1);
//        $user = UserModel::where('level_id', 1)->first();
//        $user = UserModel::firstWhere('level_id', 1);
        $user = UserModel::findOr(20, ['username', 'nama'], function () {
            abort(404);
        });
        return view('user', ['data' => $user]);
    }
}
