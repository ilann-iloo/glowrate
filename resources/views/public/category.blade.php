<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kategori {{ $category->name }} - GlowRate</title>
</head>
<body>
    <h1>Kategori: {{ $category->name }}</h1>
    <p>{{ $category->description }}</p>

    <nav>
        <a href="{{ route('home') }}">Beranda</a> |
        <a href="{{ route('products') }}">Produk</a> |
        <a href="{{ route('about') }}">Tentang</a>
    </nav>

    <hr>

    @forelse ($products as $product)
        <div style="border: 1px solid #ddd; padding: 12px; margin-bottom: 10px;">
            <h3>{{ $product->name }}</h3>
            <p>Merek: {{ $product->brand }}</p>
            <p>Harga: Rp{{ number_format($product->price, 0, ',', '.') }}</p>
            <a href="{{ route('products.detail', $product->id) }}">Lihat Detail</a>
        </div>
    @empty
        <p>Belum ada produk pada kategori ini.</p>
    @endforelse

    <div>
        {{ $products->links() }}
    </div>
</body>
</html>