@extends('layouts.public')

@section('title', 'GlowRate - Kategori')

@section('content')
    <div class="mb-4">
        <h1 class="section-title">Kategori Produk</h1>
        <p class="text-muted">
            Pilih kategori untuk melihat produk skincare dan kosmetik yang tersedia.
        </p>
    </div>

    <div class="row g-4">
        @forelse ($categories as $category)
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 rounded-4 shadow-sm h-100">
                    <div class="card-body">
                        <h5 class="fw-bold text-main">{{ $category->name }}</h5>

                        <p class="text-muted">
                            {{ $category->description ?? 'Belum ada deskripsi kategori.' }}
                        </p>

                        <p class="small text-muted">
                            {{ $category->products_count }} produk tersedia
                        </p>

                        <a href="{{ route('category', $category->id) }}" class="btn btn-outline-main btn-sm">
                            Lihat Produk
                        </a>
                    </div>
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
@endsection