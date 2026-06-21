@extends('layouts.admin')

@section('title', 'Dashboard Admin - GlowRate')

@section('page-title', 'Dashboard Admin')

@section('content')
    <div class="row g-4 mb-4">
        <div class="col-md-6 col-xl-3">
            <div class="stat-card">
                <p class="text-muted mb-1">Total User</p>
                <div class="stat-number">{{ $totalUsers }}</div>
                <small class="text-muted">User terdaftar</small>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="stat-card">
                <p class="text-muted mb-1">Total Kategori</p>
                <div class="stat-number">{{ $totalCategories }}</div>
                <small class="text-muted">Kategori produk</small>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="stat-card">
                <p class="text-muted mb-1">Total Produk</p>
                <div class="stat-number">{{ $totalProducts }}</div>
                <small class="text-muted">Produk tersedia</small>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="stat-card">
                <p class="text-muted mb-1">Total Review</p>
                <div class="stat-number">{{ $totalReviews }}</div>
                <small class="text-muted">Review masuk</small>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="soft-card">
                <h5 class="fw-bold mb-3">Status Review</h5>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <span>Review Aktif</span>
                    <span class="badge badge-soft-active px-3 py-2">
                        {{ $activeReviews }}
                    </span>
                </div>

                <div class="d-flex justify-content-between align-items-center">
                    <span>Review Nonaktif</span>
                    <span class="badge badge-soft-pending px-3 py-2">
                        {{ $pendingReviews }}
                    </span>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="soft-card">
                <h5 class="fw-bold mb-3">Proteksi Role Admin</h5>

                <p class="text-muted mb-2">
                    Halaman ini hanya dapat diakses oleh akun dengan role admin.
                </p>

                <p class="text-muted mb-0">
                    User biasa akan dikembalikan ke halaman beranda jika mencoba membuka dashboard admin.
                </p>
            </div>
        </div>
    </div>

    <div class="soft-card">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <div>
                <h5 class="fw-bold mb-1">Review Terbaru</h5>
                <p class="text-muted mb-0">
                    Daftar review terakhir yang masuk ke sistem.
                </p>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Produk</th>
                        <th>Rating</th>
                        <th>Status</th>
                        <th>Isi Review</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($latestReviews as $review)
                        <tr>
                            <td>{{ $review->user->name ?? '-' }}</td>
                            <td>{{ $review->product->name ?? '-' }}</td>
                            <td>{{ $review->rating }}/5</td>
                            <td>
                                @if ($review->status === 'Aktif')
                                    <span class="badge badge-soft-active">
                                        Aktif
                                    </span>
                                @else
                                    <span class="badge badge-soft-pending">
                                        Nonaktif
                                    </span>
                                @endif
                            </td>
                            <td>
                                {{ \Illuminate\Support\Str::limit($review->content, 60) }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Belum ada review.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection