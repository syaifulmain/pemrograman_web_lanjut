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
//        $user = UserModel::findOr(20, ['username', 'nama'], function () {
//            abort(404);
//        });

//        JS: Praktikum 2.2
//        $user = UserModel::findOrFail(1);
//        $user = UserModel::where('username', 'manager9')->firstOrFail();

//        JS: Praktikum 2.3
        $user = UserModel::where('level_id', 2)->count();
//        dd($user);

//         JS4: Praktimum 2.4
//        $user = UserModel::firstOrCreate(
//            [
//                'username' => 'manager22',
//                'nama' => 'Manager Dua Dua',
//                'password' => Hash::make('12345'),
//                'level_id' => 2
//            ],
//        );
        $user = UserModel::firstOrNew(
            [
                'username' => 'manager33',
                'nama' => 'Manager Tiga Tiga',
                'password' => Hash::make('12345'),
                'level_id' => 2
            ],
        );
        $user->save();
        return view('user', ['data' => $user]);
    }
}
