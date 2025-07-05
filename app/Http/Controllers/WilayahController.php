<?php

namespace App\Http\Controllers;

use App\Models\Umat;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class WilayahController extends Controller
{

    public function index()
    {
        $title = "Data Wilayah";
        $wilayah = Wilayah::with('umat')
            ->orderBy('nama_wilayah')
            ->paginate(10);
        $wilayah->each(function ($row) {
            $row->updateJumlahAnggota();
        });
        return view('data-display/wilayah', compact('title', 'wilayah'));
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
        $validasi['ketua_wilayah'] = '-';
        $validasi['jumlah_anggota'] = 0;
        Wilayah::create($validasi);
        return redirect('kelola/data-wilayah')->with('success', 'Data Wilayah berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $title = "Edit Data Wilayah";
        $wilayah = Wilayah::findOrFail($id);
        $umatlist = Umat::where('id_wilayah', $wilayah->id_wilayah)
            ->orderBy('nama_lengkap')
            ->get();
        return view('data-edit/edit-wilayah', compact('title', 'wilayah', 'umatlist'));
    }

    public function update(Request $request): RedirectResponse
    {
        $id_wilayah = $request->id_wilayah;
        $validasi = $request->validate([
            'nama_wilayah' => 'required|unique:wilayah,nama_wilayah,' . $id_wilayah . ',id_wilayah',
            'ketua_wilayah' => 'nullable|string',
        ]);
        $validasi['ketua_wilayah'] = $request->ketua_wilayah ?? '-';
        $wilayah = Wilayah::where('id_wilayah', $id_wilayah)->firstOrFail();
        $wilayah->update($validasi);
        return redirect('kelola/data-wilayah')->with('success', 'Data Wilayah berhasil diubah.');
    }

    public function delete($id): RedirectResponse
    {
        $wilayah = Wilayah::with(['kub.umat', 'kegiatanwilayah'])->findOrFail($id);
        if ($wilayah->kub->count() > 0) {
            return redirect('kelola/data-wilayah')->with('error', 'Tidak dapat menghapus wilayah karena masih digunakan di tabel KUB dan Umat.');
        }
        $wilayah->kegiatanwilayah()->delete();
        $wilayah->delete();
        return redirect('kelola/data-wilayah')->with('success', 'Data Wilayah dan kegiatan terkait berhasil dihapus.');
    }
}
