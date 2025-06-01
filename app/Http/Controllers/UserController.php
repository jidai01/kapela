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
        $user = User::select('id_user', 'name', 'email', 'role')->get();
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
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'role' => 'required',
        ]);

        if ($request->role === 'ketua') {
            $cekKetua = User::where('role', 'ketua')->first();
            if ($cekKetua) {
                return back()->withErrors(['role' => 'Hanya boleh ada satu user dengan peran Ketua'])->withInput();
            }
        }

        User::create($validasi);

        return redirect('kelola/data-user');
    }

    public function edit($id)
    {
        $title = "Edit Data User";
        $user = User::find($id);

        return view('data-edit/edit-user', compact('title', 'user'));
    }

    public function update(Request $request): RedirectResponse
    {
        $id_user = $request->id_user;

        $validasi = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id_user . ',id_user',
            'password' => 'nullable|min:8',
            'role' => 'required',
        ]);

        $user = User::where('id_user', $id_user)->firstOrFail();

        if ($request->role === 'ketua' && $user->role !== 'ketua') {
            $cekKetua = User::where('role', 'ketua')->where('id_user', '!=', $id_user)->first();
            if ($cekKetua) {
                return back()->withErrors(['role' => 'Hanya boleh ada satu user dengan peran Ketua'])->withInput();
            }
        }

        if (!empty($request->password)) {
            $validasi['password'] = bcrypt($request->password);
        } else {
            $validasi['password'] = $user->password;
        }

        $user->update($validasi);

        return redirect('kelola/data-user');
    }

    public function delete($id): RedirectResponse
    {
        User::where('id_user', $id)->delete();
        return redirect('kelola/data-user');
    }
}
