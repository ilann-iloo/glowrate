<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>GlowRate - Beranda</title>
</head>
<body>
    <h1>GlowRate</h1>
    <p>Temukan review produk skincare dan kosmetik sebelum membeli.</p>

    <nav>
        <a href="{{ route('home') }}">Beranda</a> |
        <a href="{{ route('products') }}">Produk</a> |
        <a href="{{ route('about') }}">Tentang</a>
    </nav>

    <hr>

    <h2>Produk Terbaru</h2>

    @forelse ($latestProducts as $product)
        <div style="border: 1px solid #ddd; padding: 12px; margin-bottom: 10px;">
            <h3>{{ $product->name }}</h3>
            <p>Merek: {{ $product->brand }}</p>
            <p>Kategori: {{ $product->category->name ?? '-' }}</p>
            <p>Harga: Rp{{ number_format($product->price, 0, ',', '.') }}</p>
            <a href="{{ route('products.detail', $product->id) }}">Lihat Detail</a>
        </div>
    @empty
        <p>Belum ada produk.</p>
    @endforelse
</body>
</html>