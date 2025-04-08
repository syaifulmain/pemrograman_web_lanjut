<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Halaman Dashboard',
            'list' => ['Dashboard']
        ];
        $page = (object) [
            'title' => 'Selamat datang di halaman Dashboard'
        ];
        $activeMenu = 'dashboard'; // set menu yang sedang aktif
        return view('dashboard.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu]);
    }
}
