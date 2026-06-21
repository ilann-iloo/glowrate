@extends('layouts.admin')

@section('title', 'Kelola Produk - GlowRate')

@section('page-title', 'Kelola Produk')

@section('content')
    <div class="soft-card">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5 class="fw-bold mb-1">Data Produk</h5>
                <p class="text-muted mb-0">Halaman ini digunakan untuk mengelola produk.</p>
            </div>

            <a href="{{ route('admin.products.create') }}" class="btn btn-main">
                Tambah Produk
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Merek</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->brand }}</td>
                            <td>{{ $product->category->name ?? '-' }}</td>
                            <td>Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Belum ada produk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection