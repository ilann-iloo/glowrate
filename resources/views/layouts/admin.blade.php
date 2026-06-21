<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin - GlowRate')</title>

    {{-- [PERUBAHAN] Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- [PERUBAHAN] CSS admin melalui Vite --}}
    @vite(['resources/css/admin.css'])

    @stack('styles')
</head>
<body>
    <div class="admin-wrapper">
        {{-- [PERUBAHAN] Sidebar admin --}}
        <aside class="admin-sidebar">
            <a href="{{ route('admin.dashboard') }}" class="admin-brand">
                GlowRate Admin
            </a>

            <nav class="admin-menu">
                <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    Dashboard
                </a>

                <a href="{{ route('admin.categories.index') }}" class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    Kelola Kategori
                </a>

                <a href="{{ route('admin.products.index') }}" class="{{ request()->routeIs('admin.products.*') ? 'active' : '' }}">
                    Kelola Produk
                </a>

                <a href="{{ route('admin.reviews.index') }}" class="{{ request()->routeIs('admin.reviews.*') ? 'active' : '' }}">
                    Kelola Review
                </a>

                <a href="{{ route('home') }}">
                    Lihat Website
                </a>

                <form action="{{ route('logout') }}" method="POST" class="mt-2">
                    @csrf
                    <button type="submit">
                        Logout
                    </button>
                </form>
            </nav>
        </aside>

        {{-- [PERUBAHAN] Konten admin --}}
        <section class="admin-content">
            <header class="admin-topbar">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="mb-0 fw-bold">@yield('page-title', 'Dashboard')</h5>
                        <small class="text-muted">
                            Panel pengelolaan data GlowRate
                        </small>
                    </div>

                    <div class="text-end">
                        <p class="mb-0 fw-semibold">
                            {{ Auth::user()->name ?? 'Admin' }}
                        </p>
                        <small class="text-muted">
                            {{ Auth::user()->role ?? '-' }}
                        </small>
                    </div>
                </div>
            </header>

            <main class="admin-main">
                {{-- [PERUBAHAN] Menampilkan pesan dari session --}}
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
        </section>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')
</body>
</html>