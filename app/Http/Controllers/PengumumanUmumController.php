<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;

class PengumumanUmumController extends Controller
{
    public function index()
    {
        $title = "Pengumuman";
        $pengumuman = Pengumuman::orderBy('id_pengumuman', 'desc')
            ->orderBy('tanggal_terbit', 'desc')
            ->paginate(5);
        return view('view-umum/pengumuman/pengumuman', compact('title', 'pengumuman'));
    }

    public function detail($slug)
    {
        $title = "Detail Pengumuman";
        $pengumuman = Pengumuman::where('slug', $slug)->first();
        if (!$pengumuman) {
            abort(404, 'Pengumuman tidak ditemukan');
        }
        return view('view-umum/pengumuman/detail-pengumuman', compact('title', 'pengumuman'));
    }
}
