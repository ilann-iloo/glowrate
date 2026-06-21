<h1>Login GlowRate</h1>

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p style="color: red;">{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="{{ route('login.process') }}" method="POST">
    @csrf

    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div>
        <label>Password</label>
        <input type="password" name="password" required>
    </div>

    <div>
        <label>
            <input type="checkbox" name="remember">
            Ingat saya
        </label>
    </div>

    <button type="submit">Login</button>
</form>

<p>
    Belum punya akun?
    <a href="{{ route('register') }}">Register</a>
</p>

<p>
    <a href="{{ route('home') }}">Kembali ke Beranda</a>
</p>