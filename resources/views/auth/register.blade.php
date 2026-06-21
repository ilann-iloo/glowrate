<h1>Register GlowRate</h1>

@if ($errors->any())
    <div>
        @foreach ($errors->all() as $error)
            <p style="color: red;">{{ $error }}</p>
        @endforeach
    </div>
@endif

<form action="{{ route('register.process') }}" method="POST">
    @csrf

    <div>
        <label>Nama</label>
        <input type="text" name="name" value="{{ old('name') }}" required>
    </div>

    <div>
        <label>Email</label>
        <input type="email" name="email" value="{{ old('email') }}" required>
    </div>

    <div>
        <label>Password</label>
        <input type="password" name="password" required>
    </div>

    <div>
        <label>Konfirmasi Password</label>
        <input type="password" name="password_confirmation" required>
    </div>

    <button type="submit">Register</button>
</form>

<p>
    Sudah punya akun?
    <a href="{{ route('login') }}">Login</a>
</p>

<p>
    <a href="{{ route('home') }}">Kembali ke Beranda</a>
</p>