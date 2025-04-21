<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $file = $request->file('profile_photo');
        $filename = Auth::user()->getUsername() . '.jpg';
        $file->move(public_path('profile_pictures'), $filename);

        return redirect('/');
    }
}
