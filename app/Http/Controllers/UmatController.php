<?php

namespace App\Http\Controllers;

use App\Models\Kub;
use App\Models\Umat;
use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class UmatController extends Controller
{
    public function index()
    {
        $title = "Data Umat";
        $umat = Umat::all();
        return view('data-display/umat', compact('title',  'umat'));
    }

    public function detail($id)
    {
        $title = "Detail Data Umat";
        $umat = Umat::find($id);

        $kublist = Kub::all();
        $wilayahlist = Wilayah::all();

        return view('data-display/detail-umat', compact('title',  'umat', 'kublist', 'wilayahlist'));
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
            'nik' => 'required|digits:16',
            'nama_lengkap' => 'required',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required',
            'alamat' => 'nullable|string',
            'nomor_telepon' => 'nullable|string|digits_between:10,13',
            'pekerjaan' => 'nullable|string',
            'id_kub' => 'required|exists:kub,id_kub',
            'status_baptis' => 'nullable|string',
            'status_komuni' => 'nullable|string',
            'status_krisma' => 'nullable|string',
            'status_nikah' => 'nullable|string',
        ], [
            'id_kub.required' => 'The field nama KUB is required',
        ]);

        if ($request->nik === '0000000000000000') {
            $lastNik = Umat::where('nik', '>=', '1000000000000000')
                ->orderBy('nik', 'desc')
                ->first();

            if ($lastNik) {
                $newNik = strval((int)$lastNik->nik + 1);
            } else {
                $newNik = '1000000000000000';
            }

            $validasi['nik'] = $newNik;
        } else {
            $validasi['nik'] = $request->nik;
        }

        $kub = Kub::findOrFail($request->id_kub);
        $validasi['id_wilayah'] = $kub->id_wilayah;

        $validasi['alamat'] = $validasi['alamat'] ?? '-';
        $validasi['nomor_telepon'] = $validasi['nomor_telepon'] ?? '-';
        $validasi['pekerjaan'] = $validasi['pekerjaan'] ?? '-';
        $validasi['status_baptis'] = $validasi['status_baptis'] ?? 'Belum';
        $validasi['status_komuni'] = $validasi['status_komuni'] ?? 'Belum';
        $validasi['status_krisma'] = $validasi['status_krisma'] ?? 'Belum';
        $validasi['status_nikah'] = $validasi['status_nikah'] ?? 'Belum';

        Umat::create($validasi);

        return redirect('kelola/data-umat');
    }

    public function edit($id)
    {
        $title = "Edit Data Umat";
        $umat = Umat::find($id);

        $kublist = Kub::all();
        $wilayahlist = Wilayah::all();

        return view('data-edit/edit-umat', compact('title', 'umat', 'kublist', 'wilayahlist'));
    }

    public function update(Request $request): RedirectResponse
    {
        $nik_lama = $request->nik_lama;

        $validasi = $request->validate([
            'nik' => 'required|digits:16',
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

        if ($request->nik === '0000000000000000') {
            $lastNik = Umat::where('nik', '>=', '1000000000000000')
                ->orderBy('nik', 'desc')
                ->first();

            if ($lastNik) {
                $newNik = strval((int)$lastNik->nik + 1);
            } else {
                $newNik = '1000000000000000';
            }

            $validasi['nik'] = $newNik;
        } else {
            if ($request->nik !== $nik_lama) {
                $exists = Umat::where('nik', $request->nik)->exists();
                if ($exists) {
                    return back()->withErrors(['nik' => 'NIK sudah digunakan oleh pengguna lain.'])->withInput();
                }
            }

            $validasi['nik'] = $request->nik;
        }

        $kub = Kub::findOrFail($request->id_kub);
        $validasi['id_wilayah'] = $kub->id_wilayah;

        $validasi['alamat'] = $validasi['alamat'] ?? '-';
        $validasi['nomor_telepon'] = $validasi['nomor_telepon'] ?? '-';
        $validasi['pekerjaan'] = $validasi['pekerjaan'] ?? '-';
        $validasi['status_baptis'] = $validasi['status_baptis'] ?? 'Belum';
        $validasi['status_komuni'] = $validasi['status_komuni'] ?? 'Belum';
        $validasi['status_krisma'] = $validasi['status_krisma'] ?? 'Belum';
        $validasi['status_nikah'] = $validasi['status_nikah'] ?? 'Belum';

        $umat = Umat::where('nik', $nik_lama)->firstOrFail();
        $umat->update($validasi);

        return redirect('kelola/data-umat');
    }

    public function delete($id): RedirectResponse
    {
        Umat::where('nik', $id)->delete();
        return redirect('kelola/data-umat');
    }
}
