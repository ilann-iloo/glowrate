@extends('layouts.auth')

@section('title', 'Register - GlowRate')

@section('content')
    <div class="auth-card">
        <div class="text-center mb-4">
            <div class="auth-logo">GlowRate</div>
            <p class="text-muted mb-0">
                Buat akun untuk menambahkan review produk.
            </p>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Register gagal.</strong>
                <ul class="mb-0 mt-2">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.process') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label fw-semibold">Nama</label>
                <input 
                    type="text" 
                    id="name"
                    name="name" 
                    class="form-control"
                    value="{{ old('name') }}" 
                    placeholder="Masukkan nama"
                    required
                >
            </div>

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
                    placeholder="Minimal 6 karakter"
                    required
                >
            </div>

            <div class="mb-4">
                <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Password</label>
                <input 
                    type="password" 
                    id="password_confirmation"
                    name="password_confirmation" 
                    class="form-control"
                    placeholder="Ulangi password"
                    required
                >
            </div>

            <button type="submit" class="btn btn-main w-100 py-2">
                Register
            </button>
        </form>

        <div class="text-center mt-4">
            <p class="text-muted mb-2">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-main fw-semibold">
                    Login
                </a>
            </p>

            <a href="{{ route('home') }}" class="text-muted">
                Kembali ke Beranda
            </a>
        </div>
    </div>
@endsection