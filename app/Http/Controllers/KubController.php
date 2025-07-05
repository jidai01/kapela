<?php

namespace App\Http\Controllers;

use App\Models\Kub;
use App\Models\Wilayah;
use App\Models\Umat;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class KubController extends Controller
{
    public function index()
    {
        $title = "Data KUB";
        $kub = Kub::with('umat', 'wilayah')
            ->orderBy('nama_kub')
            ->paginate(10);
        $kub->each(function ($row) {
            $row->updateJumlahAnggota();
        });
        return view('data-display/kub', compact('title', 'kub'));
    }

    public function tambah()
    {
        $title = "Tambah Data KUB";
        $wilayahlist = Wilayah::orderBy('nama_wilayah')->get();
        return view('data-add/tambah-kub', compact('title', 'wilayahlist'));
    }

    public function kirim(Request $request): RedirectResponse
    {
        $validasi = $request->validate([
            'nama_kub' => 'required|unique:kub,nama_kub',
            'ketua_kub' => 'nullable|string',
            'id_wilayah' => 'required|exists:wilayah,id_wilayah',
            'jumlah_anggota' => 'nullable|integer|min:0',
        ], [
            'id_wilayah.required' => 'The nama wilayah field is required',
        ]);
        $validasi['ketua_kub'] = '-';
        $validasi['jumlah_anggota'] = 0;
        Kub::create($validasi);
        return redirect('kelola/data-kub')->with('success', 'Data KUB berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $title = "Edit Data KUB";
        $kub = Kub::findOrFail($id);
        $wilayahlist = Wilayah::orderBy('nama_wilayah')->get();
        $umatlist = Umat::where('id_wilayah', $kub->id_wilayah)
            ->orderBy('nama_lengkap')
            ->get();
        return view('data-edit/edit-kub', compact('title', 'kub', 'wilayahlist', 'umatlist'));
    }

    public function update(Request $request): RedirectResponse
    {
        $id_kub = $request->id_kub;
        $validasi = $request->validate([
            'nama_kub' => 'required|unique:kub,nama_kub,' . $id_kub . ',id_kub',
            'ketua_kub' => 'nullable|string',
            'id_wilayah' => 'required|exists:wilayah,id_wilayah',
        ]);
        $validasi['ketua_kub'] = $request->ketua_kub ?? '-';
        $kub = Kub::where('id_kub', $id_kub)->firstOrFail();
        $kub->update($validasi);
        return redirect('kelola/data-kub')->with('success', 'Data KUB berhasil diubah.');
    }

    public function delete($id): RedirectResponse
    {
        $kub = Kub::with(['umat', 'kegiatankub'])->findOrFail($id);
        if ($kub->umat->count() > 0) {
            return redirect('kelola/data-kub')->with('error', 'Tidak dapat menghapus KUB karena masih digunakan di tabel Umat.');
        }
        $kub->kegiatankub()->delete();
        $kub->delete();
        return redirect('kelola/data-kub')->with('success', 'Data KUB dan kegiatan terkait berhasil dihapus.');
    }
}
