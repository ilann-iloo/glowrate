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
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($reviews as $review)
                    <tr>
                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $review->user->name ?? '-' }}</td>

                        <td>{{ $review->product->name ?? '-' }}</td>

                        <td>{{ $review->rating }}/5</td>

                        {{-- STATUS --}}
                        <td>
                            @if ($review->status === 'Aktif')
                                <span class="badge bg-success">Aktif</span>
                            @else
                                <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </td>

                        {{-- ISI REVIEW --}}
                        <td>
                            {{ \Illuminate\Support\Str::limit($review->comment, 70) }}
                        </td>

                        {{-- AKSI --}}
                        <td>

                            {{-- TOGGLE STATUS --}}
                            @if ($review->status === 'Aktif')
                                <a href="{{ route('admin.reviews.toggle', $review->id) }}"
                                   class="btn btn-sm btn-warning">
                                    Nonaktifkan
                                </a>
                            @else
                                <a href="{{ route('admin.reviews.toggle', $review->id) }}"
                                   class="btn btn-sm btn-success">
                                    Aktifkan
                                </a>
                            @endif

                            {{-- DELETE --}}
                            <form action="{{ route('admin.reviews.destroy', $review->id) }}"
                                  method="POST"
                                  style="display:inline-block;">
                                @csrf
                                @method('DELETE')

                                <button class="btn btn-sm btn-danger"
                                        onclick="return confirm('Hapus review ini?')">
                                    Hapus
                                </button>
                            </form>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center text-muted py-4">
                            Belum ada review.
                        </td>
                    </tr>
                @endforelse
            </tbody>

        </table>
    </div>

</div>
@endsection