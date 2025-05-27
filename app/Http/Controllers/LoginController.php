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
            if ($user->role === $request->role) {
                switch ($user->role) {
                    case 'admin':
                        return redirect()->route('beranda.admin');
                    case 'ketua':
                        return redirect()->route('beranda.ketua');
                    case 'humas':
                        return redirect()->route('beranda.humas');
                    default:
                        Auth::logout();
                        return back()->withErrors([
                            'role' => 'Role tidak dikenali.',
                        ]);
                }
            }

            Auth::logout();
            return back()->withErrors([
                'role' => 'Role tidak sesuai dengan akun.',
            ])->onlyInput('email');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
