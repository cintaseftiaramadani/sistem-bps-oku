<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('beranda');
    }

    public function Tentang_kami()
    {
        return view('tentang_kami');
    }
}
