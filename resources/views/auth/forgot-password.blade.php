@extends('layouts.auth')

@section('title', 'Lupa Password - GlowRate')

@section('content')

<div class="auth-card">

    <div class="text-center mb-4">
        <div class="auth-logo">
            GlowRate
        </div>

        <p class="text-muted">
            Masukkan email dan password baru.
        </p>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('forgot.password.process') }}"
        method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">
                Email
            </label>

            <input
                type="email"
                name="email"
                class="form-control"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">
                Password Baru
            </label>

            <input
                type="password"
                name="password"
                class="form-control"
                required>
        </div>

        <div class="mb-4">
            <label class="form-label">
                Konfirmasi Password
            </label>

            <input
                type="password"
                name="password_confirmation"
                class="form-control"
                required>
        </div>

        <button
            type="submit"
            class="btn btn-main w-100">
            Ubah Password
        </button>

    </form>

    <div class="text-center mt-3">
        <a href="{{ route('login') }}">
            Kembali ke Login
        </a>
    </div>

</div>

@endsection