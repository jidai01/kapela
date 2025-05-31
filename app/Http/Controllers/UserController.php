<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function user()
    {
        $title = "Data User";
        $user = User::select('name', 'email', 'role')->get();
        return view('data-display/user', compact('title',  'user'));
    }

    public function tambah()
    {
        $title = "Tambah Data User";
        return view('data-add/tambah-user', compact('title'));
    }

    public function kirim(Request $request): RedirectResponse
    {
        $validasi = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'role' => 'required',
        ]);
        User::insert($validasi);

        return redirect('kelola/data-user');
    }

    public function edit($id)
    {
        $title = "Edit Data User";
        $user = User::findOrFail($id);

        return view('data-edit/edit-user', compact('title', 'user'));
    }

    public function update(Request $request): RedirectResponse
    {
        $id = $request->id;

        $validasi = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required',
            'role' => 'required',
        ]);

        $validasi['password'] = bcrypt($request->password);

        User::where('id', $id)->update($validasi);

        return redirect('kelola/data-user')->with('success', 'Data user berhasil diperbarui');
    }
}
