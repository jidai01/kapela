<?php

namespace App\Http\Controllers;

use App\Models\Wilayah;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class WilayahController extends Controller
{

    public function wilayah()
    {
        $title = "Data Wilayah";
        $wilayah = Wilayah::all();
        return view('data-display/wilayah', compact('title',  'wilayah'));
    }

    // public function tambah()
    // {
    //     $title = "Tambah Wilayah";
    //     $content = "Ini halaman Tambah Wilayah dari controller";
    //     return view('tambah-wilayah', compact('title', 'content'));
    // }

    // public function kirim(Request $request): RedirectResponse
    // {
    //     $validasi = $request->validate([
    //         'nama_pengarang' => 'required',
    //     ]);
    //     $path = $request->file('cover')->storePublicly('pengarang', 'public');
    //     $validasi['cover'] = $path;

    //     Pengarang::insert($validasi);

    //     return redirect('/pengarang');
    // }

    // public function update(Request $request): RedirectResponse
    // {
    //     $id_pengarang = $request->id_pengarang;

    //     $validasi = $request->validate([
    //         'nama_pengarang' => 'required'
    //     ]);

    //     Pengarang::where('id_pengarang', $id_pengarang)->update($validasi);

    //     return redirect('/pengarang');
    // }

    // public function edit($id)
    // {
    //     $title = "Edit Pengarang";
    //     $content = "Ini halaman Edit Pengarang dari controller";
    //     $pengarang = Pengarang::find($id);

    //     return view('editPengarang', compact('title', 'content', 'pengarang'));
    // }

    // public function delete($id): RedirectResponse
    // {
    //     Pengarang::where('id_pengarang', $id)->delete();
    //     return redirect('/pengarang');
    // }
}
