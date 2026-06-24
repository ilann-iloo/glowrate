<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GlowRate')</title>

    {{-- [PERUBAHAN] Bootstrap untuk layout responsif --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- [PERUBAHAN] CSS halaman publik melalui Vite --}}
    @vite(['resources/css/public.css'])

    @stack('styles')
</head>
<body>
    {{-- [PERUBAHAN] Navbar publik --}}
    <nav class="navbar navbar-expand-lg navbar-public sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">
                GlowRate
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPublic">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarPublic">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products') || request()->routeIs('products.detail') ? 'active' : '' }}" href="{{ route('products') }}">
                            Produk
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('categories') || request()->routeIs('category') ? 'active' : '' }}" href="{{ route('categories') }}">
                            Kategori
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                            Tentang
                        </a>
                    </li>

                    {{-- [PERUBAHAN] Tombol auth berubah sesuai status login --}}
                    @guest
                        <li class="nav-item ms-lg-2">
                            <a class="btn btn-main btn-sm px-3" href="{{ route('login') }}">
                                Login
                            </a>
                        </li>
                    @endguest

                    @auth
                        @if (auth()->user()->role === 'admin')
                            <li class="nav-item ms-lg-2">
                                <a class="btn btn-main btn-sm px-3" href="{{ route('admin.dashboard') }}">
                                    Dashboard
                                </a>
                            </li>
                        @endif

                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-main btn-sm px-3">
                                    Logout
                                </button>
                            </form>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    {{-- [PERUBAHAN] Konten utama --}}
    <main class="container py-5">
        {{-- [PERUBAHAN] Menampilkan pesan error/success dari session --}}
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </main>

    {{-- [PERUBAHAN] Footer publik --}}
    <footer class="footer">
        <div class="container">
            <div class="row gy-3 align-items-center">
                <div class="col-md-6">
                    <h5 class="mb-1 text-main fw-bold">GlowRate</h5>
                    <p class="mb-0 text-muted">
                        Website review produk skincare dan kosmetik berbasis Laravel.
                    </p>
                </div>

                <div class="col-md-6 text-md-end">
                    <p class="mb-0 text-muted">
                        &copy; {{ date('Y') }} GlowRate. Project Pemrograman Web.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @stack('scripts')
</body>
</html>