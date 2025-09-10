<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Menampilkan halaman profil pengguna.
     */
    public function profile()
    {
        // Mengambil data pengguna yang sedang login
        $user = Auth::user();

        // Mengarahkan ke view profile dengan membawa data pengguna
        return view('users.pages.profile', ['user' => $user]);
    }

    // Anda bisa menambahkan method lain di sini nanti,
    // misalnya untuk proses update profile.
}