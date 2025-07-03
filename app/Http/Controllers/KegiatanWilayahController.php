<?php

namespace App\Http\Controllers;

use App\Models\KegiatanWilayah;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class KegiatanWilayahController extends Controller
{
    public function index()
    {
        $title = "Data Kegiatan Wilayah";
        $kegiatanwilayah = KegiatanWilayah::all();
        return view('data-display/kegiatanwilayah', compact('title', 'kegiatanwilayah'));
    }

    public function tambah()
    {
        $title = "Tambah Data Kegiatan Wilayah";
        $wilayahlist = Wilayah::all();
        return view('data-add/tambah-kegiatanwilayah', compact('title', 'wilayahlist'));
    }

    public function kirim(Request $request): RedirectResponse
    {
        $validasi = $request->validate([
            'nama_kegiatan_wilayah' => 'required|string',
            'id_wilayah' => 'required',
            'deskripsi' => 'required',
            'tanggal_kegiatan' => 'required|date',
        ], [
            'id_wilayah.required' => 'The nama wilayah field is required',
        ]);
        KegiatanWilayah::create($validasi);
        return redirect('kelola/data-kegiatan-wilayah');
    }

    public function edit($id)
    {
        $title = "Edit Data Kegiatan Wilayah";
        $kegiatanwilayah = KegiatanWilayah::find($id);
        $wilayahlist = Wilayah::all();
        return view('data-edit/edit-kegiatanwilayah', compact('title', 'kegiatanwilayah', 'wilayahlist'));
    }

    public function update(Request $request): RedirectResponse
    {
        $id_kegiatan_wilayah = $request->id_kegiatan_wilayah;
        $validasi = $request->validate([
            'nama_kegiatan_wilayah' => 'required|string',
            'id_wilayah' => 'required',
            'deskripsi' => 'required',
            'tanggal_kegiatan' => 'required|date',
        ], [
            'id_wilayah.required' => 'The nama wilayah field is required',
        ]);
        $kegiatanwilayah = KegiatanWilayah::where('id_kegiatan_wilayah', $id_kegiatan_wilayah)->firstOrFail();
        $kegiatanwilayah->update($validasi);
        return redirect('kelola/data-kegiatan-wilayah');
    }

    public function delete($id): RedirectResponse
    {
        KegiatanWilayah::where('id_kegiatan_wilayah', $id)->delete();
        return redirect('kelola/data-kegiatan-wilayah');
    }
}
