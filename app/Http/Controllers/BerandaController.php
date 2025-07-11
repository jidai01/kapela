<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Pengumuman;

class BerandaController extends Controller
{
    public function index()
    {
        $title = "Beranda";
        $content = "Halaman Beranda";
        $pengumuman = Pengumuman::orderBy('tanggal_terbit', 'desc')->limit(3)->get();
        $berita = Berita::orderBy('tanggal_terbit', 'desc')->limit(3)->get();
        return view('view-umum/beranda', compact('title', 'content', 'pengumuman', 'berita'));
    }

    public function index_admin()
    {
        $title = "Beranda Admin";
        $content = "Halaman Beranda Admin";
        return view('view-admin/beranda-admin', compact('title', 'content'));
    }

    public function index_ketua()
    {
        $title = "Beranda Ketua";
        $content = "Halaman Beranda Ketua";
        return view('view-ketua/beranda-ketua', compact('title', 'content'));
    }

    public function index_pengurus()
    {
        $title = "Beranda Pengurus";
        $content = "Halaman Beranda Pengurus";
        return view('view-pengurus/beranda-pengurus', compact('title', 'content'));
    }

    public function index_humas()
    {
        $title = "Beranda Humas";
        $content = "Halaman Beranda Humas";
        return view('view-humas/beranda-humas', compact('title', 'content'));
    }
}
