<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        return 'Selamat Datang';
    }

    public function about()
    {
        return 'NIM : 2341720013 <br> Nama : Muhamad Syaifullah';
    }

    public function articles($id)
    {
        return 'Halaman artikel dengan ID ' . $id;
    }
}
