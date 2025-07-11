<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckDynamicRole
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $roleFromUrl = $request->route('role'); // ambil role dari parameter URL

        // Jika belum login atau role tidak cocok
        if (!Auth::check() || Auth::user()->role !== $roleFromUrl) {
            return redirect('/login')->withErrors([
                'akses' => 'Anda tidak memiliki izin untuk mengakses halaman ini.'
            ]);
        }

        return $next($request);
    }
}
