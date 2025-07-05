<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PengumumanController extends Controller
{
    public function index()
    {
        $title = "Data Pengumuman";
        $pengumuman = Pengumuman::orderBy('tanggal_terbit', 'desc')
            ->orderBy('id_pengumuman', 'desc')
            ->paginate(50);
        return view('data-display/pengumuman', compact('title', 'pengumuman'));
    }

    public function tambah()
    {
        $title = "Tambah Data Pengumuman";
        return view('data-add/tambah-pengumuman', compact('title'));
    }

    public function kirim(Request $request): RedirectResponse
    {
        $validasi = $request->validate([
            'judul_pengumuman' => 'required|unique:pengumuman,judul_pengumuman',
            'isi_pengumuman' => 'required',
            'tanggal_terbit' => 'required|date',
        ]);
        Pengumuman::create($validasi);
        return redirect('kelola/data-pengumuman')->with('success', 'Data Pengumuman berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $title = "Edit Data Pengumuman";
        $pengumuman = Pengumuman::find($id);
        return view('data-edit/edit-pengumuman', compact('title', 'pengumuman'));
    }

    public function update(Request $request): RedirectResponse
    {
        $id_pengumuman = $request->id_pengumuman;
        $validasi = $request->validate([
            'judul_pengumuman' => 'required|unique:pengumuman,judul_pengumuman,' . $id_pengumuman . ',id_pengumuman',
            'isi_pengumuman' => 'required',
            'tanggal_terbit' => 'required|date',
        ]);
        $pengumuman = Pengumuman::where('id_pengumuman', $id_pengumuman)->firstOrFail();
        $pengumuman->update($validasi);
        return redirect('kelola/data-pengumuman')->with('success', 'Data Pengumuman berhasil diubah.');
    }

    public function delete($id): RedirectResponse
    {
        Pengumuman::where('id_pengumuman', $id)->delete();
        return redirect('kelola/data-pengumuman')->with('success', 'Data Pengumuman berhasil dihapus.');
    }
}
