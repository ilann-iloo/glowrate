@extends('layouts.public')

@section('title', 'Kategori ' . $category->name . ' - GlowRate')

@section('content')
    <div class="mb-4">
        <h1 class="section-title">Kategori: {{ $category->name }}</h1>
        <p class="text-muted">
            {{ $category->description ?? 'Produk yang tersedia dalam kategori ini.' }}
        </p>
    </div>

    <div class="row g-4">
        @forelse ($products as $product)
            <div class="col-md-6 col-lg-3">
                @include('partials.product-card', ['product' => $product])
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-light border">
                    Belum ada produk pada kategori ini.
                </div>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
@endsection