<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
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
            'foto' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $path = $request->file('foto')->storePublicly('berita', 'public');
        $validasi['foto'] = $path;

        Berita::create($validasi);

        return redirect('kelola/data-berita');
    }

    public function edit($id)
    {
        $title = "Edit Data Berita";
        $berita = Berita::findOrFail($id);

        return view('data-edit/edit-berita', compact('title', 'berita'));
    }

    public function update(Request $request): RedirectResponse
    {
        $id_berita = $request->id_berita;

        $validasi = $request->validate([
            'judul_berita' => 'required|unique:berita,judul_berita,' . $id_berita . ',id_berita',
            'isi_berita' => 'required',
            'tanggal_terbit' => 'required|date',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $berita = Berita::where('id_berita', $id_berita)->firstOrFail();

        if ($request->hasFile('foto')) {
            if ($berita->foto && Storage::disk('public')->exists($berita->foto)) {
                Storage::disk('public')->delete($berita->foto);
            }
            $path = $request->file('foto')->storePublicly('berita', 'public');
            $validasi['foto'] = $path;
        }

        $berita->update($validasi);

        return redirect('kelola/data-berita');
    }

    public function delete($id): RedirectResponse
    {
        $berita = Berita::findOrFail($id);

        if ($berita->foto && Storage::disk('public')->exists($berita->foto)) {
            Storage::disk('public')->delete($berita->foto);
        }

        $berita->delete();

        return redirect('kelola/data-berita');
    }
}
