<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use App\Models\PenerimaanSakramen;
use App\Models\Sakramen;
use App\Models\Umat;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class PenerimaanSakramenController extends Controller
{
    public function index()
    {
        $title = "Data Penerimaan Sakramen";
        $penerimaansakramen = PenerimaanSakramen::orderBy('tanggal_penerimaan_sakramen', 'desc')
            ->orderBy('id', 'desc')
            ->paginate(50);
        return view('data-display/penerimaansakramen', compact('title', 'penerimaansakramen'));
    }

    public function tambah()
    {
        $title = "Tambah Data Penerimaan Sakramen";
        $sakramenlist = Sakramen::all();
        $umatlist = Umat::all();
        return view('data-add/tambah-penerimaansakramen', compact('title', 'sakramenlist', 'umatlist'));
    }

    public function kirim(Request $request): RedirectResponse
    {
        $validasi = $request->validate([
            'id_sakramen' => 'required',
            'nik' => [
                'required',
                Rule::unique('penerimaan_sakramen')->where(function ($query) use ($request) {
                    return $query->where('id_sakramen', $request->id_sakramen);
                }),
            ],
            'tanggal_penerimaan_sakramen' => 'required|date',
        ], [
            'id_sakramen.required' => 'The nama sakramen field is required',
            'nik.required' => 'The nama umat field is required',
            'nik.unique' => 'The data for this sakramen and umat is already exist',
        ]);
        PenerimaanSakramen::create($validasi);
        $this->updateStatusUmat($request->nik, $request->id_sakramen);
        return redirect('kelola/data-penerimaan-sakramen')->with('success', 'Data Penerimaan Sakramen berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $title = "Edit Data Penerimaan Sakramen";
        $penerimaansakramen = PenerimaanSakramen::find($id);
        $sakramenlist = Sakramen::all();
        $umatlist = Umat::all();
        return view('data-edit/edit-penerimaansakramen', compact('title', 'penerimaansakramen', 'sakramenlist', 'umatlist'));
    }

    public function update(Request $request): RedirectResponse
    {
        $id = $request->id;
        $validasi = $request->validate([
            'id_sakramen' => 'required',
            'nik' => [
                'required',
                Rule::unique('penerimaan_sakramen')->ignore($id)->where(function ($query) use ($request) {
                    return $query->where('id_sakramen', $request->id_sakramen);
                }),
            ],
            'tanggal_penerimaan_sakramen' => 'required|date',
        ], [
            'id_sakramen.required' => 'The nama sakramen field is required',
            'nik.required' => 'The nama umat field is required',
            'nik.unique' => 'The data for this sakramen and umat is already exist',
        ]);
        $penerimaansakramen = PenerimaanSakramen::findOrFail($id);
        $penerimaansakramen->update($validasi);
        $this->updateStatusUmat($request->nik, $request->id_sakramen);
        return redirect('kelola/data-penerimaan-sakramen')->with('success', 'Data Penerimaan Sakramen berhasil diubah.');
    }

    public function delete($id): RedirectResponse
    {
        $penerimaan = PenerimaanSakramen::find($id);
        if ($penerimaan) {
            $nik = $penerimaan->nik;
            $penerimaan->delete();
            $this->updateStatusUmat($nik);
        }
        return redirect('kelola/data-penerimaan-sakramen')->with('success', 'Data Penerimaan Sakramen berhasil dihapus.');
    }

    private function updateStatusUmat($nik, $id_sakramen = null)
    {
        $umat = Umat::where('nik', $nik)->first();
        if (!$umat) {
            return;
        }
        $semuaSakramen = Sakramen::all();
        foreach ($semuaSakramen as $sakramen) {
            $id = $sakramen->id_sakramen;
            $hasPenerimaan = PenerimaanSakramen::where('nik', $nik)
                ->where('id_sakramen', $id)
                ->exists();
            $status = $hasPenerimaan ? 'Sudah' : 'Belum';
            switch ((int)$id) {
                case 1:
                    $umat->status_baptis = $status;
                    break;
                case 2:
                    $umat->status_komuni = $status;
                    break;
                case 3:
                    $umat->status_krisma = $status;
                    break;
                case 4:
                    $umat->status_nikah = $status;
                    break;
            }
        }
        $umat->save();
    }
}
