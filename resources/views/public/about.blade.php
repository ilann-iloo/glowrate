@extends('layouts.public')

@section('title', 'Tentang GlowRate')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="bg-white rounded-4 shadow-sm p-5">
                <h1 class="section-title mb-4">Tentang GlowRate</h1>

                <p class="text-muted">
                    GlowRate adalah website review produk skincare dan kosmetik yang membantu pengguna
                    melihat informasi produk, membaca review, dan mengetahui rating produk sebelum membeli.
                </p>

                <p class="text-muted">
                    Website ini dibuat untuk menyajikan informasi produk secara lebih terstruktur.
                    Pengunjung dapat melihat daftar produk, mencari produk, memfilter berdasarkan kategori,
                    serta membaca review aktif dari pengguna lain.
                </p>

                <p class="text-muted mb-0">
                    Dalam project ini, GlowRate menerapkan konsep Laravel, Blade, relasi database,
                    CRUD, autentikasi, search, pagination, upload gambar, dan moderasi review oleh admin.
                </p>
            </div>
        </div>
    </div>
@endsection