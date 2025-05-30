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
}
