@extends('layouts.auth')

@section('title', 'Login - GlowRate')

@section('content')
    <div class="auth-card">

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="text-center mb-4">
            <div class="auth-logo">GlowRate</div>

            <p class="text-muted mb-0">
                Masuk untuk melanjutkan ke akun Anda.
            </p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Login gagal.</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label fw-semibold">Email</label>
                <input 
                    type="email" 
                    id="email"
                    name="email" 
                    class="form-control"
                    value="{{ old('email') }}" 
                    placeholder="Masukkan email"
                    required
                >
            </div>

            <div class="mb-3">
                <label for="password" class="form-label fw-semibold">Password</label>
                <input 
                    type="password" 
                    id="password"
                    name="password" 
                    class="form-control"
                    placeholder="Masukkan password"
                    required
                >
            </div>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <div class="form-check">
                    <input 
                        class="form-check-input" 
                        type="checkbox" 
                        name="remember" 
                        id="remember"
                    >
                    <label class="form-check-label" for="remember">
                        Ingat saya
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-main w-100 py-2">
                Login
            </button>
        </form>

        <div class="text-center mt-4">
            <p class="text-muted mb-2">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-main fw-semibold">
                    Register
                </a>
            </p>

            <a href="{{ route('home') }}" class="text-muted">
                Kembali ke Beranda
            </a>
        </div>
    </div>
@endsection