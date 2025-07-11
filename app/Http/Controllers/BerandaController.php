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

    public function index_dashboard($role)
    {
        $allowed = ['admin', 'ketua', 'pengurus', 'humas'];

        if (!in_array(strtolower($role), $allowed)) {
            redirect('/login')->with('error', 'Role tidak dikenali.');
        }

        $title = "Beranda " . ucfirst($role);
        $content = "Halaman Beranda " . ucfirst($role);

        return view('view-user/logged-user', compact('title', 'content'));
    }
}
