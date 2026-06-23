@extends('layouts.public')

@section('title', $product->name . ' - GlowRate')

@section('content')
    <div class="product-detail-page">
        <a href="{{ route('products') }}" class="btn btn-outline-main mb-4">
            Kembali ke Produk
        </a>

        <div class="row g-4 align-items-stretch">
            <div class="col-lg-5">
                <div class="soft-card product-image-card h-100">
                    @if ($product->image)
                        <img 
                            src="{{ asset('storage/' . $product->image) }}" 
                            alt="{{ $product->name }}" 
                            class="product-detail-image"
                        >
                    @else
                        <div class="product-placeholder product-detail-image">
                            GlowRate Product
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-lg-7">
                <div class="soft-card product-info-card h-100" style="padding: 28px 32px !important;">
                    <span class="badge badge-category product-category-badge">
                        {{ $product->category->name ?? 'Tanpa Kategori' }}
                    </span>

                    <h1 class="product-detail-title">
                        {{ $product->name }}
                    </h1>

                    <p class="product-detail-brand">
                        {{ $product->brand }}
                    </p>

                    <h3 class="price-text product-detail-price">
                        Rp{{ number_format($product->price, 0, ',', '.') }}
                    </h3>

                    <div class="product-meta-wrap">
                        <div class="product-meta-item">
                            <span class="product-meta-label">Rating Rata-rata</span>
                            <span class="product-meta-value">
                                @if ($product->average_rating)
                                    {{ number_format($product->average_rating, 1) }}/5
                                @else
                                    Belum ada rating
                                @endif
                            </span>
                        </div>

                        <div class="product-meta-item">
                            <span class="product-meta-label">Jumlah Review</span>
                            <span class="product-meta-value">
                                {{ $product->active_reviews_count }} review
                            </span>
                        </div>
                    </div>

                    <div class="product-description-box">
                        <h5 class="section-title mb-2">Deskripsi Produk</h5>
                        <p class="product-description-text mb-0">
                            {{ $product->description }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        {{-- [PERUBAHAN] Form tambah review --}}
        <div class="soft-card review-form-card mt-4" style="padding: 28px 32px !important;">
            <h4 class="section-title mb-3">Tulis Review Produk</h4>

            @guest
                <p class="text-muted mb-3">
                    Anda harus login terlebih dahulu untuk menulis review produk.
                </p>

                <a href="{{ route('login') }}" class="btn btn-main">
                    Login untuk Review
                </a>
            @endguest

            @auth
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Review belum valid.</strong>
                        <ul class="mb-0 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('reviews.store', $product->id) }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="rating" class="form-label review-label">Rating</label>
                        <select name="rating" id="rating" class="form-select review-input" required>
                            <option value="">Pilih Rating</option>
                            <option value="5" {{ old('rating') == 5 ? 'selected' : '' }}>5 - Sangat Baik</option>
                            <option value="4" {{ old('rating') == 4 ? 'selected' : '' }}>4 - Baik</option>
                            <option value="3" {{ old('rating') == 3 ? 'selected' : '' }}>3 - Cukup</option>
                            <option value="2" {{ old('rating') == 2 ? 'selected' : '' }}>2 - Kurang</option>
                            <option value="1" {{ old('rating') == 1 ? 'selected' : '' }}>1 - Buruk</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label review-label">Isi Review</label>
                        <textarea 
                            name="content" 
                            id="content" 
                            class="form-control review-input review-textarea" 
                            rows="5"
                            placeholder="Tulis pengalaman Anda menggunakan produk ini"
                            required
                        >{{ old('content') }}</textarea>
                    </div>

                    <div class="d-flex align-items-center justify-content-between flex-wrap gap-2">
                        <small class="text-muted">
                            Review akan langsung tampil setelah dikirim.
                        </small>

                        <button type="submit" class="btn btn-main px-4">
                            Kirim Review
                        </button>
                    </div>
                </form>
            @endauth
        </div>

        {{-- [PERUBAHAN] Daftar review aktif --}}
        <div class="soft-card review-list-card mt-4" style="padding: 28px 32px !important;">
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap gap-2">
                <h4 class="section-title mb-0">Review Pengguna</h4>
                <span class="review-count-badge">
                    {{ $product->active_reviews_count }} Review
                </span>
            </div>

            @forelse ($product->activeReviews as $review)
                <div class="single-review-item" style="background-color: #fff7f5; border-radius: 16px; padding: 16px 20px; margin-bottom: 12px;">
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-2 mb-2">
                        <div>
                            <h6 class="review-user-name mb-1">
                                {{ $review->user->name ?? 'User' }}
                            </h6>
                            <span class="review-rating-chip">
                                Rating {{ $review->rating }}/5
                            </span>
                        </div>

                        <small class="text-muted">
                            {{ $review->created_at ? $review->created_at->format('d M Y') : '' }}
                        </small>
                    </div>

                    <p class="review-content-text mb-0">
                        {{ $review->content }}
                    </p>
                </div>
            @empty
                <div class="empty-review-box">
                    <p class="text-muted mb-0">
                        Belum ada review untuk produk ini.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
@endsection