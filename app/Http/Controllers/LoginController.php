<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        $title = "Login";
        return view('view-umum/login', compact('title'));
    }

    public function authenticate(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'role' => ['required'],
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->role !== $request->role) {
                Auth::logout();
                return back()->with('error', 'Role tidak sesuai dengan akun.')->withInput();
            }
            return match ($user->role) {
                'admin' => redirect('/beranda/admin'),
                'ketua' => redirect('/beranda/ketua'),
                'humas' => redirect('/beranda/humas'),
                default => back()->with('error', 'Role tidak dikenali.'),
            };
        }
        return back()->with('error', 'Email atau password salah.')->withInput();
    }

    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login')->with('success', 'Berhasil logout.');
    }
}
