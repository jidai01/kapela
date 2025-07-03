<?php

namespace App\Http\Controllers;

use App\Models\Berita;

class BeritaUmumController extends Controller
{
    public function index()
    {
        $title = "Berita";
        $berita = Berita::orderBy('id_berita', 'desc')
            ->orderBy('tanggal_terbit', 'desc')
            ->paginate(5);
        return view('view-umum/berita/berita', compact('title', 'berita'));
    }

    public function detail($slug)
    {
        $title = "Detail Berita";
        $berita = Berita::where('slug', $slug)->first();
        if (!$berita) {
            abort(404, 'Berita tidak ditemukan');
        }
        return view('view-umum/berita/detail-berita', compact('title', 'berita'));
    }
}
