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
    public function penerimaan_sakramen()
    {
        $title = "Data Penerimaan Sakramen";
        $penerimaansakramen = PenerimaanSakramen::all();
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

        return redirect('kelola/data-penerimaan-sakramen');
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

        $penerimaansakramen = PenerimaanSakramen::where('id', $id)->firstOrFail();

        $penerimaansakramen->update($validasi);

        return redirect('kelola/data-penerimaan-sakramen');
    }

    public function delete($id): RedirectResponse
    {
        PenerimaanSakramen::where('id', $id)->delete();
        return redirect('kelola/data-penerimaan-sakramen');
    }
}
