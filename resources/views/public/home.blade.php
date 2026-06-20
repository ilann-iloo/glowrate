@extends('layouts.public')

@section('title', 'GlowRate - Beranda')

@section('content')
    <section class="hero-section mb-5">
        <div class="row align-items-center gy-4">
            <div class="col-lg-7">
                <h1 class="display-5 fw-bold mb-3">
                    Temukan Review Produk Kecantikan Sebelum Membeli
                </h1>

                <p class="lead text-muted mb-4">
                    GlowRate membantu pengguna melihat informasi produk skincare dan kosmetik,
                    membaca review, serta mengetahui rating produk secara lebih terstruktur.
                </p>

                <a href="{{ route('products') }}" class="btn btn-main px-4 py-2">
                    Lihat Produk
                </a>
            </div>

            <div class="col-lg-5">
                <div class="bg-white rounded-4 p-4 shadow-sm">
                    <h5 class="fw-bold text-main">Fitur Utama</h5>
                    <ul class="mb-0 text-muted">
                        <li>Melihat daftar produk skincare dan kosmetik</li>
                        <li>Mencari produk berdasarkan nama atau merek</li>
                        <li>Memfilter produk berdasarkan kategori</li>
                        <li>Membaca review aktif dari pengguna</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">Produk Terbaru</h2>
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
                    <div class="alert alert-light border">
                        Belum ada produk yang tersedia.
                    </div>
                </div>
            @endforelse
        </div>
    </section>

    <section>
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="section-title mb-0">Kategori Produk</h2>
            <a href="{{ route('categories') }}" class="btn btn-outline-main btn-sm">
                Lihat Kategori
            </a>
        </div>

        <div class="row g-4">
            @forelse ($categories as $category)
                <div class="col-md-6 col-lg-3">
                    <div class="bg-white rounded-4 shadow-sm p-4 h-100">
                        <h5 class="fw-bold text-main">{{ $category->name }}</h5>
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
                    <div class="alert alert-light border">
                        Belum ada kategori.
                    </div>
                </div>
            @endforelse
        </div>
    </section>
@endsection