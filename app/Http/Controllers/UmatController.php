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

    public function tambah()
    {
        $title = "Tambah Data Umat";
        $kublist = Kub::all();
        $wilayahlist = Wilayah::all();
        return view('data-add/tambah-umat', compact('title', 'kublist', 'wilayahlist'));
    }

    public function kirim(Request $request): RedirectResponse
    {
        $validasi = $request->validate([
            'nik' => 'required|unique:umat,nik',
            'nama_lengkap' => 'required',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required',
            'alamat' => 'nullable|string',
            'nomor_telepon' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
            'id_kub' => 'required|exists:kub,id_kub',
            'status_baptis' => 'nullable|string',
            'status_komuni' => 'nullable|string',
            'status_krisma' => 'nullable|string',
            'status_nikah' => 'nullable|string',
        ], [
            'id_kub.required' => 'The field nama KUB is required',
        ]);

        $kub = Kub::findOrFail($request->id_kub);
        $validasi['id_wilayah'] = $kub->id_wilayah;

        $validasi['alamat'] = $validasi['alamat'] ?? '-';
        $validasi['nomor_telepon'] = $validasi['nomor_telepon'] ?? '-';
        $validasi['pekerjaan'] = $validasi['pekerjaan'] ?? '-';
        $validasi['status_baptis'] = $validasi['status_baptis'] ?? '-';
        $validasi['status_komuni'] = $validasi['status_komuni'] ?? '-';
        $validasi['status_krisma'] = $validasi['status_krisma'] ?? '-';
        $validasi['status_nikah'] = $validasi['status_nikah'] ?? '-';

        Umat::create($validasi);

        return redirect('kelola/data-umat');
    }

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
