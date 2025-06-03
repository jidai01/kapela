<?php

namespace App\Http\Controllers;

use App\Models\Kub;
use App\Models\Umat;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class UmatController extends Controller
{
    public function umat()
    {
        $title = "Data Umat";
        $umat = Umat::all();
        return view('data-display/umat', compact('title',  'umat'));
    }

    // public function tambah()
    // {
    //     $title = "Tambah Data KUB";
    //     $wilayahlist = Wilayah::all();
    //     return view('data-add/tambah-kub', compact('title', 'wilayahlist'));
    // }

    // public function kirim(Request $request): RedirectResponse
    // {
    //     $validasi = $request->validate([
    //         'nama_kub' => 'required|unique:kub,nama_kub',
    //         'ketua_kub' => 'nullable|string',
    //         'id_wilayah' => 'required',
    //         'jumlah_anggota' => 'nullable|integer|min:0',
    //     ], [
    //         'id_wilayah.required' => 'The nama wilayah field is required',
    //     ]);

    //     $validasi['ketua_kub'] = $validasi['ketua_kub'] ?? '-';
    //     $validasi['jumlah_anggota'] = $validasi['jumlah_anggota'] ?? 0;

    //     Kub::create($validasi);

    //     return redirect('kelola/data-kub');
    // }

    // public function edit($id)
    // {
    //     $title = "Edit Data KUB";
    //     $kub = Kub::find($id);

    //     $wilayahlist = Wilayah::all();

    //     return view('data-edit/edit-kub', compact('title', 'kub', 'wilayahlist'));
    // }

    // public function update(Request $request): RedirectResponse
    // {
    //     $id_kub = $request->id_kub;

    //     $validasi = $request->validate([
    //         'nama_kub' => 'required|unique:kub,nama_kub,' . $id_kub . ',id_kub',
    //         'ketua_kub' => 'nullable|string',
    //         'id_wilayah' => 'required',
    //         'jumlah_anggota' => 'nullable|integer|min:0',
    //     ], [
    //         'id_wilayah.required' => 'The nama wilayah field is required',
    //     ]);

    //     $kub = Kub::where('id_kub', $id_kub)->firstOrFail();

    //     $kub->update($validasi);

    //     return redirect('kelola/data-kub');
    // }

    // public function delete($id): RedirectResponse
    // {
    //     Kub::where('id_kub', $id)->delete();
    //     return redirect('kelola/data-kub');
    // }
}
