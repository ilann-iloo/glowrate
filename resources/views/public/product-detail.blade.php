@extends('layouts.public')

@section('title', $product->name . ' - GlowRate')

@section('content')
    <a href="{{ route('products') }}" class="btn btn-outline-main btn-sm mb-4">
        Kembali ke Produk
    </a>

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
                    GlowRate Product
                </div>
            @endif
        </div>

        <div class="col-lg-7">
            <span class="badge badge-category mb-3">
                {{ $product->category->name ?? 'Tanpa Kategori' }}
            </span>

            <h1 class="section-title mb-2">
                {{ $product->name }}
            </h1>

            <p class="text-muted mb-2">
                Merek: {{ $product->brand }}
            </p>

            <h4 class="price-text mb-4">
                Rp{{ number_format($product->price, 0, ',', '.') }}
            </h4>

            <div class="soft-card p-4 mb-4">
                @if ($product->active_reviews_count > 0)
                    <p class="mb-1 fw-semibold">
                        Rating Rata-rata:
                        {{ number_format($product->average_rating, 1) }}/5
                    </p>

                    <p class="text-muted mb-0">
                        Berdasarkan {{ $product->active_reviews_count }} review aktif.
                    </p>
                @else
                    <p class="text-muted mb-0">
                        Produk ini belum memiliki review aktif.
                    </p>
                @endif
            </div>

            <h5 class="fw-bold">Deskripsi Produk</h5>
            <p class="text-muted">
                {{ $product->description }}
            </p>
        </div>
    </div>

    <hr class="my-5">

    <section>
        <div class="mb-4">
            <h3 class="section-title mb-1">Review Produk</h3>
            <p class="text-muted mb-0">
                Review yang ditampilkan hanya review yang sudah disetujui admin.
            </p>
        </div>

        @forelse ($product->activeReviews as $review)
            <div class="soft-card p-4 mb-3">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div>
                        <h6 class="fw-bold mb-0">
                            {{ $review->user->name ?? 'User' }}
                        </h6>

                        <small class="text-muted">
                            {{ $review->created_at->format('d M Y') }}
                        </small>
                    </div>

                    <span class="badge badge-category">
                        Rating {{ $review->rating }}/5
                    </span>
                </div>

                <p class="text-muted mb-0">
                    {{ $review->content }}
                </p>
            </div>
        @empty
            <div class="empty-state">
                Belum ada review aktif untuk produk ini.
            </div>
        @endforelse
    </section>
@endsection