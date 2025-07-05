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
        $umat = Umat::with('kub', 'wilayah')
            ->orderBy('nik')
            ->paginate(50);
        return view('data-display/umat', compact('title', 'umat'));
    }

    public function detail($id)
    {
        $title = "Detail Data Umat";
        $umat = Umat::with('kub', 'wilayah')
            ->findOrFail($id);
        $kublist = Kub::all();
        $wilayahlist = Wilayah::all();
        return view('data-display/detail-umat', compact('title', 'umat', 'kublist', 'wilayahlist'));
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
            'nik' => 'required|digits:16|unique:umat,nik',
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
            'nik.unique' => 'NIK sudah digunakan oleh umat lain.',
            'id_kub.required' => 'Field nama KUB wajib diisi.',
        ]);
        if ($request->nik === '0000000000000000') {
            $lastNik = Umat::where('nik', '>=', '1000000000000000')
                ->orderByDesc('nik')
                ->first();
            $validasi['nik'] = $lastNik ? strval((int)$lastNik->nik + 1) : '1000000000000000';
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
        return redirect('kelola/data-umat')->with('success', 'Data Umat berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $title = "Edit Data Umat";
        $umat = Umat::findOrFail($id);
        $kublist = Kub::all();
        $wilayahlist = Wilayah::all();
        return view('data-edit/edit-umat', compact('title', 'umat', 'kublist', 'wilayahlist'));
    }

    public function update(Request $request): RedirectResponse
    {
        $nikLama = $request->nik_lama;
        $validated = $request->validate([
            'nik' => 'required|digits:16',
            'nama_lengkap' => 'required|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|in:L,P',
            'alamat' => 'nullable|string|max:255',
            'nomor_telepon' => 'nullable|string|max:13',
            'pekerjaan' => 'nullable|string|max:100',
            'id_kub' => 'required|exists:kub,id_kub',
            'status_baptis' => 'nullable|in:Sudah,Belum',
            'status_komuni' => 'nullable|in:Sudah,Belum',
            'status_krisma' => 'nullable|in:Sudah,Belum',
            'status_nikah' => 'nullable|in:Sudah,Belum',
        ]);
        if ($request->nik !== $nikLama) {
            $exists = Umat::where('nik', $request->nik)->exists();
            if ($exists) {
                return redirect('kelola/edit-umat/' . $nikLama)
                    ->with('error', 'NIK sudah digunakan oleh Umat lain.')
                    ->withInput();
            }
        }
        $data = array_merge($validated, [
            'alamat' => $validated['alamat'] ?? '-',
            'nomor_telepon' => $validated['nomor_telepon'] ?? '-',
            'pekerjaan' => $validated['pekerjaan'] ?? '-',
            'status_baptis' => $validated['status_baptis'] ?? 'Belum',
            'status_komuni' => $validated['status_komuni'] ?? 'Belum',
            'status_krisma' => $validated['status_krisma'] ?? 'Belum',
            'status_nikah' => $validated['status_nikah'] ?? 'Belum',
        ]);
        $kub = Kub::findOrFail($validated['id_kub']);
        $data['id_wilayah'] = $kub->id_wilayah;
        $umat = Umat::where('nik', $nikLama)->firstOrFail();
        $umat->update($data);
        return redirect('kelola/data-umat')->with('success', 'Data Umat berhasil diubah.');
    }

    public function delete($id): RedirectResponse
    {
        $umat = Umat::with('penerimaansakramen')->where('nik', $id)->firstOrFail();
        if ($umat->penerimaansakramen->count() > 0) {
            return redirect('kelola/data-umat')->with('error', 'Tidak dapat menghapus Umat karena masih digunakan di tabel Penerimaan Sakramen.');
        }
        $umat->delete();
        return redirect('kelola/data-umat')->with('success', 'Data Umat berhasil dihapus.');
    }
}
