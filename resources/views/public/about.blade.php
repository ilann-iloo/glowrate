@extends('layouts.public')

@section('title', 'Tentang GlowRate')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="soft-card p-5">
                <span class="hero-label">
                    Tentang Website
                </span>

                <h1 class="section-title mb-4">
                    Tentang GlowRate
                </h1>

                <p class="text-muted">
                    GlowRate adalah website review produk skincare dan kosmetik yang membantu pengguna
                    melihat informasi produk, membaca review, dan mengetahui rating produk sebelum membeli.
                </p>

                <p class="text-muted">
                    Website ini dibuat untuk menyajikan informasi produk secara lebih terstruktur.
                    Pengunjung dapat melihat daftar produk, mencari produk, memfilter berdasarkan kategori,
                    serta membaca review aktif dari pengguna lain.
                </p>

                <p class="text-muted">
                    Website ini juga menyediakan halaman admin untuk mengelola data kategori, produk,
                    upload gambar produk, serta moderasi review agar ulasan yang tampil tetap relevan.
                </p>

                <div class="row g-3 mt-4">
                    <div class="col-md-4">
                        <div class="bg-light rounded-4 p-3 h-100">
                            <h6 class="fw-bold text-main">CRUD</h6>
                            <p class="text-muted small mb-0">
                                Admin dapat mengelola kategori, produk, dan review.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="bg-light rounded-4 p-3 h-100">
                            <h6 class="fw-bold text-main">Search & Filter</h6>
                            <p class="text-muted small mb-0">
                                Pengunjung dapat mencari produk dan memfilter kategori.
                            </p>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="bg-light rounded-4 p-3 h-100">
                            <h6 class="fw-bold text-main">Moderasi Review</h6>
                            <p class="text-muted small mb-0">
                                Review hanya tampil jika statusnya sudah aktif.
                            </p>
                        </div>
                    </div>
                </div>

                <p class="text-muted mt-4 mb-0">
                    Dalam project ini, GlowRate menerapkan Laravel, Blade, relasi database,
                    CRUD, autentikasi, search, pagination, upload gambar, dan moderasi review oleh admin.
                </p>
            </div>
        </div>
    </div>
@endsection