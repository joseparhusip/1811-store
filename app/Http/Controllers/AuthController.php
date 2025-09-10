<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rules;

class AuthController extends Controller
{
    // Menampilkan halaman signup
    public function showSignupForm()
    {
        return view('users.pages.signup');
    }

    // Memproses pendaftaran pengguna baru
    public function signup(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'nomor_handphone' => ['required', 'string', 'max:15'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->username, // Sesuaikan 'name' dengan kolom di tabel users Anda
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->nomor_handphone, // Sesuaikan 'phone' dengan kolom di tabel users Anda
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('home'); // Arahkan ke halaman utama setelah berhasil daftar
    }

    // Menampilkan halaman login
    public function showLoginForm()
    {
        return view('users.pages.login');
    }

    // Memproses login
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/'); // Arahkan ke halaman yang dituju sebelumnya atau ke home
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // Memproses logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}