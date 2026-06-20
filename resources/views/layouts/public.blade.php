<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'GlowRate')</title>

    {{-- [PERUBAHAN] Bootstrap CDN untuk mempercepat pembuatan tampilan --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    {{-- [PERUBAHAN] Style sederhana untuk tampilan publik GlowRate --}}
    <style>
        body {
            background-color: #fff8f6;
            color: #2f2f2f;
            font-family: Arial, sans-serif;
        }

        .navbar {
            background-color: #ffffff;
            border-bottom: 1px solid #f1d8d2;
        }

        .navbar-brand {
            font-weight: 700;
            color: #b35b6a !important;
            letter-spacing: 0.3px;
        }

        .nav-link {
            color: #444 !important;
            font-weight: 500;
        }

        .nav-link.active,
        .nav-link:hover {
            color: #b35b6a !important;
        }

        .hero-section {
            background: linear-gradient(135deg, #ffe4df, #fff8f6);
            border-radius: 24px;
            padding: 56px 32px;
        }

        .section-title {
            font-weight: 700;
            color: #2f2f2f;
        }

        .text-main {
            color: #b35b6a;
        }

        .btn-main {
            background-color: #b35b6a;
            color: #ffffff;
            border: none;
        }

        .btn-main:hover {
            background-color: #9f4d5c;
            color: #ffffff;
        }

        .btn-outline-main {
            border: 1px solid #b35b6a;
            color: #b35b6a;
        }

        .btn-outline-main:hover {
            background-color: #b35b6a;
            color: #ffffff;
        }

        .product-card {
            border: none;
            border-radius: 18px;
            overflow: hidden;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
            transition: 0.2s ease;
            height: 100%;
        }

        .product-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.10);
        }

        .product-image {
            height: 210px;
            object-fit: cover;
            background-color: #f6e7e4;
        }

        .product-placeholder {
            height: 210px;
            background-color: #f6e7e4;
            color: #9b6b72;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }

        .badge-category {
            background-color: #ffe4df;
            color: #9f4d5c;
            font-weight: 500;
        }

        .footer {
            background-color: #ffffff;
            border-top: 1px solid #f1d8d2;
            margin-top: 64px;
            padding: 28px 0;
        }
    </style>

    @stack('styles')
</head>
<body>
    {{-- [PERUBAHAN] Navbar publik --}}
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">GlowRate</a>

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

                    <li class="nav-item ms-lg-2">
                        {{-- [PERUBAHAN] Pakai url agar tidak error walaupun route login belum dibuat --}}
                        <a class="btn btn-main btn-sm px-3" href="{{ url('/login') }}">
                            Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    {{-- [PERUBAHAN] Tempat isi halaman --}}
    <main class="container py-5">
        @yield('content')
    </main>

    {{-- [PERUBAHAN] Footer publik --}}
    <footer class="footer">
        <div class="container">
            <div class="row gy-3 align-items-center">
                <div class="col-md-6">
                    <h5 class="mb-1 text-main">GlowRate</h5>
                    <p class="mb-0 text-muted">
                        Temukan review produk skincare dan kosmetik sebelum membeli.
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

    {{-- [PERUBAHAN] Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>