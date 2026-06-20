@extends('layouts.public')

@section('title', $product->name . ' - GlowRate')

@section('content')
    <div class="row g-5">
        <div class="col-lg-5">
            @if ($product->image)
                <img 
                    src="{{ asset('storage/' . $product->image) }}" 
                    class="img-fluid rounded-4 shadow-sm w-100" 
                    alt="{{ $product->name }}"
                >
            @else
                <div class="product-placeholder rounded-4">
                    Tidak Ada Gambar
                </div>
            @endif
        </div>

        <div class="col-lg-7">
            <span class="badge badge-category mb-3">
                {{ $product->category->name ?? 'Tanpa Kategori' }}
            </span>

            <h1 class="section-title mb-2">{{ $product->name }}</h1>

            <p class="text-muted mb-2">
                Merek: {{ $product->brand }}
            </p>

            <h4 class="text-main mb-4">
                Rp{{ number_format($product->price, 0, ',', '.') }}
            </h4>

            <h5 class="fw-bold">Deskripsi Produk</h5>
            <p class="text-muted">
                {{ $product->description }}
            </p>
        </div>
    </div>

    <hr class="my-5">

    <section>
        <h3 class="section-title mb-4">Review Produk</h3>

        @forelse ($product->reviews as $review)
            <div class="bg-white rounded-4 shadow-sm p-4 mb-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <h6 class="fw-bold mb-0">
                        {{ $review->user->name ?? 'User' }}
                    </h6>

                    <span class="badge badge-category">
                        Rating {{ $review->rating }}/5
                    </span>
                </div>

                <p class="text-muted mb-0">
                    {{ $review->content }}
                </p>
            </div>
        @empty
            <div class="alert alert-light border">
                Belum ada review aktif untuk produk ini.
            </div>
        @endforelse
    </section>
@endsection