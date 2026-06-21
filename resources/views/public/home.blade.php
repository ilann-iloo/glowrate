@extends('layouts.public')

@section('title', 'GlowRate - Beranda')

@section('content')
    <section class="hero-section mb-5">
        <div class="row align-items-center gy-4">
            <div class="col-lg-7">
                <span class="hero-label">
                    Review Produk Kecantikan
                </span>

                <h1 class="display-5 fw-bold mb-3">
                    Temukan Review Produk Skincare dan Kosmetik Sebelum Membeli
                </h1>

                <p class="lead text-muted mb-4">
                    GlowRate membantu pengguna melihat informasi produk, membaca review aktif,
                    serta mencari produk berdasarkan kategori dan merek secara lebih mudah.
                </p>

                <div class="d-flex flex-wrap gap-2">
                    <a href="{{ route('products') }}" class="btn btn-main px-4 py-2">
                        Lihat Produk
                    </a>

                    <a href="{{ route('about') }}" class="btn btn-outline-main px-4 py-2">
                        Tentang Website
                    </a>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="soft-card p-4">
                    <h5 class="fw-bold text-main mb-3">Fitur Pengunjung</h5>

                    <div class="d-grid gap-3">
                        <div>
                            <h6 class="fw-bold mb-1">Cari Produk</h6>
                            <p class="text-muted mb-0">Temukan produk berdasarkan nama atau merek.</p>
                        </div>

                        <div>
                            <h6 class="fw-bold mb-1">Filter Kategori</h6>
                            <p class="text-muted mb-0">Pilih kategori seperti skincare, kosmetik, body care, dan hair care.</p>
                        </div>

                        <div>
                            <h6 class="fw-bold mb-1">Baca Review</h6>
                            <p class="text-muted mb-0">Review yang tampil hanya review aktif yang sudah dimoderasi.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="section-title mb-1">Produk Terbaru</h2>
                <p class="text-muted mb-0">Produk skincare dan kosmetik yang baru ditambahkan.</p>
            </div>

            <a href="{{ route('products') }}" class="btn btn-outline-main btn-sm">
                Lihat Semua
            </a>
        </div>

        <div class="row g-4">
            @forelse ($latestProducts as $product)
                <div class="col-md-6 col-lg-4">
                    @include('partials.product-card', ['product' => $product])
                </div>
            @empty
                <div class="col-12">
                    <div class="empty-state">
                        Belum ada produk yang tersedia. Data produk dapat ditambahkan melalui halaman admin.
                    </div>
                </div>
            @endforelse
        </div>
    </section>

    <section>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="section-title mb-1">Kategori Produk</h2>
                <p class="text-muted mb-0">Pilih kategori produk sesuai kebutuhan.</p>
            </div>

            <a href="{{ route('categories') }}" class="btn btn-outline-main btn-sm">
                Lihat Kategori
            </a>
        </div>

        <div class="row g-4">
            @forelse ($categories as $category)
                <div class="col-md-6 col-lg-3">
                    <div class="soft-card p-4 h-100">
                        <h5 class="fw-bold text-main">
                            {{ $category->name }}
                        </h5>

                        <p class="text-muted small mb-3">
                            {{ $category->products_count }} produk tersedia
                        </p>

                        <a href="{{ route('category', $category->id) }}" class="btn btn-outline-main btn-sm">
                            Lihat Produk
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="empty-state">
                        Belum ada kategori yang tersedia.
                    </div>
                </div>
            @endforelse
        </div>
    </section>
@endsection