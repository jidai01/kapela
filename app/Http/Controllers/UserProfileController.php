<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserProfileController extends Controller
{
    public function index()
    {
        $title = "User Profile";
        $user = Auth::user();
        return view('view-user/profil', compact('title', 'user'));
    }

    public function update(Request $request): RedirectResponse
    {
        $logged = Auth::user()->email; // User yang sedang login
        $user = User::where('email', $logged)->first();

        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email,' . $user->id_user . ',id_user',
            'current_password' => 'nullable|required_with:password',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // Siapkan data untuk update
        $dataUpdate = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Jika password baru diisi
        if ($request->filled('password')) {
            // Validasi password lama
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->with('error', 'Password lama tidak sesuai.');
            }

            // Hash dan tambahkan password baru
            $dataUpdate['password'] = Hash::make($request->password);
        }

        // Simpan perubahan
        $user->update($dataUpdate);

        return redirect('profil/' . $user->email)->with('success', 'Profil berhasil diubah.');
    }
}
