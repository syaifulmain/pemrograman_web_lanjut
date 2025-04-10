<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        return view('profile.index', compact('user', 'breadcrumb', 'page', 'activeMenu'));
    }

    public function edit(Request $request)
    {
        $user = UserModel::findOrFail(auth()->user()->getUserId());

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
