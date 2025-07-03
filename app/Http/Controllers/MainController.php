<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
    public function main()
    {
        $title = "Main";
        $content = "";
        return view('template/main', compact('title', 'content'));
    }
}
