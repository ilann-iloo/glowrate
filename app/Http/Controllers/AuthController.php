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
        // [PERUBAHAN] Jika sudah login, arahkan sesuai role
        if (Auth::check()) {
            return $this->redirectByRole();
        }

        return view('auth.login');
    }

    public function login(Request $request)
    {
        // [PERUBAHAN] Validasi input login
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // [PERUBAHAN] Proses login menggunakan Auth Laravel
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return $this->redirectByRole();
        }

        return back()
            ->withErrors([
                'email' => 'Email atau password tidak sesuai.',
            ])
            ->onlyInput('email');
    }

    public function showRegister()
    {
        // [PERUBAHAN] Jika sudah login, arahkan sesuai role
        if (Auth::check()) {
            return $this->redirectByRole();
        }

        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6', 'confirmed'],
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        return redirect()
            ->route('login')
            ->with('success', 'Registrasi berhasil. Silahkan login.');
    }

    public function showForgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {

            return back()->withErrors([
                'email' => 'Email tidak ditemukan.'
            ]);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect()
            ->route('login')
            ->with(
                'success',
                'Password berhasil diubah. Silakan login.'
            );
    }

    public function logout(Request $request)
    {
        // [PERUBAHAN] Logout user/admin
        Auth::logout();

        // [PERUBAHAN] Menghapus session lama
        $request->session()->invalidate();

        // [PERUBAHAN] Membuat ulang token CSRF
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    private function redirectByRole()
    {
        // [PERUBAHAN] Admin masuk ke dashboard admin
        if (Auth::user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // [PERUBAHAN] User biasa kembali ke beranda
        return redirect()->route('home');
    }
}
