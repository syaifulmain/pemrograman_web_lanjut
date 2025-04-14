<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $breadcrumb = (object)[
            'title' => 'Profile',
            'list' => ['Home', 'Profile']
        ];
        $page = (object)[
            'title' => 'Profile'
        ];
        $activeMenu = 'profile';
        return view('profile.index', [
            'breadcrumb' => $breadcrumb,
            'page' => $page,
            'activeMenu' => $activeMenu,
            'user' => $user
        ]);
    }

    public function edit(Request $request)
    {
        $user = UserModel::findOrFail(auth()->user()->getUserId());

        $rules = [
            'username' => 'required|string|min:3|max:20|unique:m_user,username,' . $user->user_id . ',user_id',
            'nama' => 'required|string|min:3|max:100',
            'password' => 'nullable|min:6|max:255',
            'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('profile')->with('error', 'Validasi Gagal')->withErrors($validator)->withInput();
        }

        $user->username = $request->username;
        $user->nama = $request->nama;
        if ($request->password != "") {
            $user->password = Hash::make($request->password);
        }
        if ($request->hasFile('profile_picture')) {
            $file = $request->file('profile_picture');
            $filename = $user->getAvatarName() . '.png';
            $file->move(public_path('profile_picture'), $filename);
        }
        $user->save();

        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }
}
