<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function beranda()
    {
        $title = "Beranda";
        $content = "Halaman Beranda";
        return view('beranda', compact('title', 'content'));
    }
}
