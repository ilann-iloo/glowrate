<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $product->name }} - GlowRate</title>
</head>
<body>
    <nav>
        <a href="{{ route('home') }}">Beranda</a> |
        <a href="{{ route('products') }}">Produk</a> |
        <a href="{{ route('about') }}">Tentang</a>
    </nav>

    <hr>

    <h1>{{ $product->name }}</h1>

    @if ($product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="250">
    @endif

    <p><strong>Merek:</strong> {{ $product->brand }}</p>
    <p><strong>Kategori:</strong> {{ $product->category->name ?? '-' }}</p>
    <p><strong>Harga:</strong> Rp{{ number_format($product->price, 0, ',', '.') }}</p>
    <p><strong>Deskripsi:</strong></p>
    <p>{{ $product->description }}</p>

    <hr>

    <h2>Review Produk</h2>

    @forelse ($product->reviews as $review)
        <div style="border: 1px solid #ddd; padding: 12px; margin-bottom: 10px;">
            <p><strong>{{ $review->user->name ?? 'User' }}</strong></p>
            <p>Rating: {{ $review->rating }}/5</p>
            <p>{{ $review->content }}</p>
        </div>
    @empty
        <p>Belum ada review aktif untuk produk ini.</p>
    @endforelse
</body>
</html>