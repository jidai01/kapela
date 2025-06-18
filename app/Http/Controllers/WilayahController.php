<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class WilayahController extends Controller
{

    public function index()
    {
        $title = "Data Wilayah";
        $wilayah = Wilayah::all();
        return view('data-display/wilayah', compact('title',  'wilayah'));
    }

    public function tambah()
    {
        $title = "Tambah Data Wilayah";
        return view('data-add/tambah-wilayah', compact('title'));
    }

    public function kirim(Request $request): RedirectResponse
    {
        $validasi = $request->validate([
            'nama_wilayah' => 'required|unique:wilayah,nama_wilayah',
            'ketua_wilayah' => 'nullable|string',
            'jumlah_anggota' => 'nullable|integer|min:0',
        ]);

        $validasi['ketua_wilayah'] = $validasi['ketua_wilayah'] ?? '-';
        $validasi['jumlah_anggota'] = $validasi['jumlah_anggota'] ?? 0;

        Wilayah::create($validasi);

        return redirect('kelola/data-wilayah');
    }

    public function edit($id)
    {
        $title = "Edit Data Wilayah";
        $wilayah = Wilayah::find($id);

        return view('data-edit/edit-wilayah', compact('title', 'wilayah'));
    }

    public function update(Request $request): RedirectResponse
    {
        $id_wilayah = $request->id_wilayah;

        $validasi = $request->validate([
            'nama_wilayah' => 'required|unique:wilayah,nama_wilayah,' . $id_wilayah . ',id_wilayah',
            'ketua_wilayah' => 'nullable|string',
            'jumlah_anggota' => 'nullable|integer|min:0',
        ]);

        $wilayah = Wilayah::where('id_wilayah', $id_wilayah)->firstOrFail();

        $wilayah->update($validasi);

        return redirect('kelola/data-wilayah');
    }

    public function delete($id): RedirectResponse
    {
        $wilayah = Wilayah::with(['kub.umat', 'kegiatanwilayah'])->findOrFail($id);

        if ($wilayah->kub->count() > 0) {
            session()->flash('error', 'Tidak dapat menghapus wilayah karena masih digunakan di tabel KUB dan Umat.');
            return redirect()->back();
        }

        $wilayah->kegiatanwilayah()->delete();
        $wilayah->delete();

        session()->flash('success', 'Data Wilayah dan kegiatan terkait berhasil dihapus.');
        return redirect('kelola/data-wilayah');
    }
}
