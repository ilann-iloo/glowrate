@extends('layouts.public')

@section('title', 'GlowRate - Produk')

@section('content')
    <div class="mb-4">
        <h1 class="section-title">Daftar Produk</h1>
        <p class="text-muted">
            Cari produk skincare dan kosmetik berdasarkan nama, merek, atau kategori.
        </p>
    </div>

    <form action="{{ route('products') }}" method="GET" class="bg-white rounded-4 p-4 shadow-sm mb-4">
        <div class="row g-3">
            <div class="col-md-6">
                <input 
                    type="text" 
                    name="search" 
                    class="form-control"
                    placeholder="Cari produk atau merek..."
                    value="{{ request('search') }}"
                >
            </div>

            <div class="col-md-4">
                <select name="category" class="form-select">
                    <option value="">Semua Kategori</option>

                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2 d-grid">
                <button type="submit" class="btn btn-main">
                    Cari
                </button>
            </div>
        </div>
    </form>

    <div class="row g-4">
        @forelse ($products as $product)
            <div class="col-md-6 col-lg-3">
                @include('partials.product-card', ['product' => $product])
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-light border">
                    Produk tidak ditemukan.
                </div>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
@endsection