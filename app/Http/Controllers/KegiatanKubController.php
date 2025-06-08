<?php

namespace App\Http\Controllers;

use App\Models\KegiatanKub;
use App\Models\Kub;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class KegiatanKubController extends Controller
{
    public function kegiatan_kub()
    {
        $title = "Data Kegiatan Kub";
        $kegiatankub = KegiatanKub::all();
        return view('data-display/kegiatankub', compact('title', 'kegiatankub'));
    }

    public function tambah()
    {
        $title = "Tambah Data Kegiatan Kub";
        $kublist = Kub::all();
        return view('data-add/tambah-kegiatankub', compact('title', 'kublist'));
    }

    public function kirim(Request $request): RedirectResponse
    {
        $validasi = $request->validate([
            'nama_kegiatan_kub' => 'required|string',
            'id_kub' => 'required',
            'deskripsi' => 'required',
            'tanggal_kegiatan' => 'required|date',
        ], [
            'id_kub.required' => 'The nama kub field is required',
        ]);

        KegiatanKub::create($validasi);

        return redirect('kelola/data-kegiatan-kub');
    }

    public function edit($id)
    {
        $title = "Edit Data Kegiatan KUB";
        $kegiatankub = KegiatanKub::find($id);

        $kublist = Kub::all();

        return view('data-edit/edit-kegiatankub', compact('title', 'kegiatankub', 'kublist'));
    }

    public function update(Request $request): RedirectResponse
    {
        $id_kegiatan_kub = $request->id_kegiatan_kub;

        $validasi = $request->validate([
            'nama_kegiatan_kub' => 'required|string',
            'id_kub' => 'required',
            'deskripsi' => 'required',
            'tanggal_kegiatan' => 'required|date',
        ], [
            'id_kub.required' => 'The nama kub field is required',
        ]);

        $kegiatankub = KegiatanKub::where('id_kegiatan_kub', $id_kegiatan_kub)->firstOrFail();

        $kegiatankub->update($validasi);

        return redirect('kelola/data-kegiatan-kub');
    }

    public function delete($id): RedirectResponse
    {
        KegiatanKub::where('id_kegiatan_kub', $id)->delete();
        return redirect('kelola/data-kegiatan-kub');
    }
}
