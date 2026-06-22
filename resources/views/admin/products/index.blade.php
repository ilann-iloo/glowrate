@extends('layouts.admin')

@section('title', 'Kelola Produk - GlowRate')

@section('page-title', 'Kelola Produk')

@section('content')
    <div class="soft-card">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        
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
                        <th>Gambar</th>
                        <th>Produk</th>
                        <th>Merek</th>
                        <th>Kategori</th>
                        <th>Harga</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @forelse ($products as $product)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>
                        @if ($product->image)
                            <img
                                src="{{ asset('storage/' . $product->image) }}"
                                width="70"
                                class="img-thumbnail"
                            >
                        @else
                            -
                        @endif
                    </td>

                    <td>{{ $product->name }}</td>

                    <td>{{ $product->brand }}</td>

                    <td>{{ $product->category->name ?? '-' }}</td>

                    <td>
                        Rp{{ number_format($product->price, 0, ',', '.') }}
                    </td>

                    <td>

                        <a
                            href="{{ route('admin.products.edit', $product->id) }}"
                            class="btn btn-warning btn-sm"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('admin.products.destroy', $product->id) }}"
                            method="POST"
                            class="d-inline"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin ingin menghapus produk ini?')"
                            >
                                Hapus
                            </button>
                        </form>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="7" class="text-center text-muted py-4">
                        Belum ada produk.
                    </td>
                </tr>

                @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection