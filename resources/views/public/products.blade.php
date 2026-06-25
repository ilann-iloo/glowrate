@extends('layouts.public')

@section('title', 'GlowRate - Produk')

@section('content')
    <div class="mb-4">
        <h1 class="section-title">Daftar Produk</h1>
        <p class="text-muted">
            Cari produk skincare dan kosmetik berdasarkan nama, merek, atau kategori.
        </p>
    </div>

    <form action="{{ route('products') }}" method="GET" class="soft-card p-4 mb-4">
        <div class="row g-3 align-items-end">
            <div class="col-md-5">
                <label for="search" class="form-label fw-semibold">Cari Produk</label>
                <input 
                    type="text" 
                    id="search"
                    name="search" 
                    class="form-control"
                    placeholder="Contoh: Wardah, Emina, sunscreen..."
                    value="{{ request('search') }}"
                >
            </div>

            <div class="col-md-4">
                <label for="category" class="form-label fw-semibold">Filter Kategori</label>
                <select id="category" name="category" class="form-select">
                    <option value="">Semua Kategori</option>

                    @foreach ($categories as $category)
                        <option 
                            value="{{ $category->id }}" 
                            {{ request('category') == $category->id ? 'selected' : '' }}
                        >
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3 d-flex gap-2">
                <button type="submit" class="btn btn-main flex-fill">
                    Cari
                </button>

                <a href="{{ route('products') }}" class="btn btn-outline-secondary">
                    Reset
                </a>
            </div>
        </div>
    </form>

    @if (request('search') || request('category'))
        <div class="alert alert-light border mb-4">
            Menampilkan hasil
            @if (request('search'))
                untuk pencarian <strong>"{{ request('search') }}"</strong>
            @endif

            @if (request('category'))
                @php
                    $selectedCategory = $categories->firstWhere('id', request('category'));
                @endphp

                @if ($selectedCategory)
                    pada kategori <strong>{{ $selectedCategory->name }}</strong>
                @endif
            @endif
        </div>
    @endif

    <div class="row g-4">
        @forelse ($products as $product)
            <div class="col-md-6 col-lg-3">
                @include('partials.product-card', ['product' => $product])
            </div>
        @empty
            <div class="col-12">
                <div class="empty-state">
                    Produk tidak ditemukan. Coba gunakan kata kunci atau kategori lain.
                </div>
            </div>
        @endforelse
    </div>

    @if ($products->hasPages())
        <div class="mt-4">
            {{ $products->links() }}
        </div>
    @endif
@endsection