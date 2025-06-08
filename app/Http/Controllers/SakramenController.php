<?php

namespace App\Http\Controllers;

use App\Models\Sakramen;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class SakramenController extends Controller
{
    public function index()
    {
        $title = "Data Sakramen";
        $sakramen = Sakramen::all();
        return view('data-display/sakramen', compact('title',  'sakramen'));
    }

    public function tambah()
    {
        $title = "Tambah Data Sakramen";
        return view('data-add/tambah-sakramen', compact('title'));
    }

    public function kirim(Request $request): RedirectResponse
    {
        $validasi = $request->validate([
            'nama_sakramen' => 'required|unique:sakramen,nama_sakramen',
        ]);

        Sakramen::create($validasi);

        return redirect('kelola/data-sakramen');
    }

    public function edit($id)
    {
        $title = "Edit Data Sakramen";
        $sakramen = Sakramen::find($id);

        return view('data-edit/edit-sakramen', compact('title', 'sakramen'));
    }

    public function update(Request $request): RedirectResponse
    {
        $id_sakramen = $request->id_sakramen;

        $validasi = $request->validate([
            'nama_sakramen' => 'required|unique:sakramen,nama_sakramen,' . $id_sakramen . ',id_sakramen',
        ]);

        $sakramen = Sakramen::where('id_sakramen', $id_sakramen)->firstOrFail();

        $sakramen->update($validasi);

        return redirect('kelola/data-sakramen');
    }

    public function delete($id): RedirectResponse
    {
        Sakramen::where('id_sakramen', $id)->delete();
        return redirect('kelola/data-sakramen');
    }
}
