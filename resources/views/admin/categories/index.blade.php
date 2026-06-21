@extends('layouts.admin')

@section('title', 'Kelola Kategori - GlowRate')

@section('page-title', 'Kelola Kategori')

@section('content')
    <div class="soft-card">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5 class="fw-bold mb-1">Data Kategori</h5>
                <p class="text-muted mb-0">Halaman ini digunakan untuk mengelola kategori produk.</p>
            </div>

            <a href="{{ route('admin.categories.create') }}" class="btn btn-main">
                Tambah Kategori
            </a>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description ?? '-' }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted py-4">
                                Belum ada kategori.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection