@extends('layouts.admin')

@section('title', 'Kelola Review - GlowRate')

@section('page-title', 'Kelola Review')

@section('content')
    <div class="soft-card">
        <h5 class="fw-bold mb-1">Data Review</h5>
        <p class="text-muted mb-3">
            Halaman ini digunakan untuk melihat dan memoderasi review produk.
        </p>

        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>User</th>
                        <th>Produk</th>
                        <th>Rating</th>
                        <th>Status</th>
                        <th>Isi Review</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($reviews as $review)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $review->user->name ?? '-' }}</td>
                            <td>{{ $review->product->name ?? '-' }}</td>
                            <td>{{ $review->rating }}/5</td>
                            <td>
                                @if ($review->status === 'Aktif')
                                    <span class="badge badge-soft-active">Aktif</span>
                                @else
                                    <span class="badge badge-soft-pending">Nonaktif</span>
                                @endif
                            </td>
                            <td>{{ \Illuminate\Support\Str::limit($review->content, 70) }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">
                                Belum ada review.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection