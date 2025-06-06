<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class BeritaController extends Controller
{
    public function berita()
    {
        $title = "Data Berita";
        $berita = Berita::all();
        return view('data-display/berita', compact('title', 'berita'));
    }

    public function tambah()
    {
        $title = "Tambah Data Berita";
        return view('data-add/tambah-berita', compact('title'));
    }

    public function kirim(Request $request): RedirectResponse
    {
        $validasi = $request->validate([
            'judul_berita' => 'required|unique:berita,judul_berita',
            'isi_berita' => 'required',
            'tanggal_terbit' => 'required|date',
        ]);
        $path = $request->file('foto')->storePublicly('berita', 'public');
        $validasi['foto'] = $path;

        Berita::create($validasi);

        return redirect('kelola/data-berita');
    }

    // public function edit($id)
    // {
    //     $title = "Edit Data Pengumuman";
    //     $pengumuman = Pengumuman::find($id);

    //     return view('data-edit/edit-pengumuman', compact('title', 'pengumuman'));
    // }

    // public function update(Request $request): RedirectResponse
    // {
    //     $id_pengumuman = $request->id_pengumuman;

    //     $validasi = $request->validate([
    //         'judul_pengumuman' => 'required|unique:pengumuman,judul_pengumuman,' . $id_pengumuman . ',id_pengumuman',
    //         'isi_pengumuman' => 'required',
    //         'tanggal_terbit' => 'required|date',
    //     ]);

    //     $pengumuman = Pengumuman::where('id_pengumuman', $id_pengumuman)->firstOrFail();

    //     $pengumuman->update($validasi);

    //     return redirect('kelola/data-pengumuman');
    // }

    // public function delete($id): RedirectResponse
    // {
    //     Pengumuman::where('id_pengumuman', $id)->delete();
    //     return redirect('kelola/data-pengumuman');
    // }
}
