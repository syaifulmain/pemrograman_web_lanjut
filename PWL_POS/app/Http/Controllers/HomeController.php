<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if(Auth::check()){
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
        return redirect('/login');
    }
}
