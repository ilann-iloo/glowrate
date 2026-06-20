<div class="card product-card">
    @if ($product->image)
        {{-- [PERUBAHAN] Menampilkan gambar produk dari storage --}}
        <img 
            src="{{ asset('storage/' . $product->image) }}" 
            class="card-img-top product-image" 
            alt="{{ $product->name }}"
        >
    @else
        {{-- [PERUBAHAN] Placeholder jika produk belum punya gambar --}}
        <div class="product-placeholder">
            Tidak Ada Gambar
        </div>
    @endif

    <div class="card-body d-flex flex-column">
        <div class="mb-2">
            <span class="badge badge-category">
                {{ $product->category->name ?? 'Tanpa Kategori' }}
            </span>
        </div>

        <h5 class="card-title mb-1">{{ $product->name }}</h5>

        <p class="text-muted mb-2">
            {{ $product->brand }}
        </p>

        <p class="fw-semibold mb-3">
            Rp{{ number_format($product->price, 0, ',', '.') }}
        </p>

        <a href="{{ route('products.detail', $product->id) }}" class="btn btn-outline-main mt-auto">
            Lihat Detail
        </a>
    </div>
</div>