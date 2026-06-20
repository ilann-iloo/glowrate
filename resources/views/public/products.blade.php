<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>GlowRate - Produk</title>
</head>
<body>
    <h1>Daftar Produk</h1>

    <nav>
        <a href="{{ route('home') }}">Beranda</a> |
        <a href="{{ route('products') }}">Produk</a> |
        <a href="{{ route('about') }}">Tentang</a>
    </nav>

    <hr>

    <form action="{{ route('products') }}" method="GET">
        <input 
            type="text" 
            name="search" 
            placeholder="Cari produk atau merek..." 
            value="{{ request('search') }}"
        >

        <select name="category">
            <option value="">Semua Kategori</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Cari</button>
    </form>

    <hr>

    @forelse ($products as $product)
        <div style="border: 1px solid #ddd; padding: 12px; margin-bottom: 10px;">
            <h3>{{ $product->name }}</h3>
            <p>Merek: {{ $product->brand }}</p>
            <p>Kategori: {{ $product->category->name ?? '-' }}</p>
            <p>Harga: Rp{{ number_format($product->price, 0, ',', '.') }}</p>
            <a href="{{ route('products.detail', $product->id) }}">Lihat Detail</a>
        </div>
    @empty
        <p>Produk tidak ditemukan.</p>
    @endforelse

    <div>
        {{ $products->links() }}
    </div>
</body>
</html>