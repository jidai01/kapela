<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function beranda()
    {
        $title = "Beranda";
        $content = "Halaman Beranda";
        return view('view-umum/beranda', compact('title', 'content'));
    }

    public function berandaAdmin()
    {
        $title = "Beranda Admin";
        $content = "Halaman Beranda Admin";
        return view('view-admin/beranda-admin', compact('title', 'content'));
    }

    public function berandaKetua()
    {
        $title = "Beranda Ketua";
        $content = "Halaman Beranda Ketua";
        return view('view-ketua/beranda-ketua', compact('title', 'content'));
    }

    public function berandaHumas()
    {
        $title = "Beranda Humas";
        $content = "Halaman Beranda Humas";
        return view('view-humas/beranda-humas', compact('title', 'content'));
    }
}
