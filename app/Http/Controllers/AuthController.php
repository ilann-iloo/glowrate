<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        // [PERUBAHAN] Menampilkan halaman login
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // [PERUBAHAN] Validasi input login
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // [PERUBAHAN] Proses autentikasi user/admin
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // [PERUBAHAN] Arahkan admin ke dashboard admin
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            // [PERUBAHAN] Arahkan user biasa ke beranda
            return redirect()->route('home');
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password tidak sesuai.',
            ])
            ->onlyInput('email');
    }

    public function showRegister()
    {
        // [PERUBAHAN] Menampilkan halaman register
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // [PERUBAHAN] Validasi input register
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        // [PERUBAHAN] Membuat akun user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        // [PERUBAHAN] Login otomatis setelah register
        Auth::login($user);
        $request->session()->regenerate();

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        // [PERUBAHAN] Logout dan hapus session
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
