<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check()){ // jika sudah login, maka redirect ke halaman home
            if (Auth::user()->getRole() == 'ADM') {
                return redirect('/user');
            } elseif (Auth::user()->getRole() == 'MNG') {
                return redirect('/dashboard');
            } elseif (Auth::user()->getRole() == 'STF') {
                return redirect('/penjualan');
            } else {
                return redirect('/login');
            }
        }
        return view('auth.login');
    }
}
