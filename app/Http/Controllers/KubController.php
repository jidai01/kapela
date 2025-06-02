<?php

namespace App\Http\Controllers;

use App\Models\Kub;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class KubController extends Controller
{
    public function kub()
    {
        $title = "Data KUB";
        $kub = Kub::all();
        return view('data-display/kub', compact('title',  'kub'));
    }

    public function tambah()
    {
        $title = "Tambah Data KUB";
        $wilayahlist = Wilayah::all();
        return view('data-add/tambah-kub', compact('title', 'wilayahlist'));
    }

    public function kirim(Request $request): RedirectResponse
    {
        $validasi = $request->validate([
            'nama_kub' => 'required|unique:kub,nama_kub',
            'ketua_kub' => 'nullable|string',
            'id_wilayah' => 'required',
            'jumlah_anggota' => 'nullable|integer|min:0',
        ]);

        $validasi['ketua_kub'] = $validasi['ketua_kub'] ?? '-';
        $validasi['jumlah_anggota'] = $validasi['jumlah_anggota'] ?? 0;

        Kub::create($validasi);

        return redirect('kelola/data-kub');
    }

    public function edit($id)
    {
        $title = "Edit Data KUB";
        $kub = Kub::find($id);

        $wilayahlist = Wilayah::all();

        return view('data-edit/edit-kub', compact('title', 'kub', 'wilayahlist'));
    }

    // public function update(Request $request): RedirectResponse
    // {
    //     $id_wilayah = $request->id_wilayah;

    //     $validasi = $request->validate([
    //         'nama_wilayah' => 'required|unique:wilayah,nama_wilayah,' . $id_wilayah . ',id_wilayah',
    //         'ketua_wilayah' => 'nullable|string',
    //         'jumlah_anggota' => 'nullable|integer|min:0',
    //     ]);

    //     $wilayah = Wilayah::where('id_wilayah', $id_wilayah)->firstOrFail();

    //     $wilayah->update($validasi);

    //     return redirect('kelola/data-wilayah');
    // }

    // public function delete($id): RedirectResponse
    // {
    //     Wilayah::where('id_wilayah', $id)->delete();
    //     return redirect('kelola/data-wilayah');
    // }
}
