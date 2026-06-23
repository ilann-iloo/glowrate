@extends('layouts.admin')

@section('title', 'Kelola Review - GlowRate')

@section('page-title', 'Kelola Review')

@section('content')
<div class="soft-card">

    <div class="mb-3">
        <h5 class="fw-bold mb-1">Data Review</h5>
        <p class="text-muted mb-0">
            Halaman ini digunakan admin untuk mengaktifkan, menonaktifkan, dan menghapus review produk.
        </p>
    </div>

    <div class="table-responsive">
        <table class="table align-middle" id="reviewTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Produk</th>
                    <th>Rating</th>
                    <th>Status</th>
                    <th>Isi Review</th>
                    <th width="220">Aksi</th>
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
                            {{ \Illuminate\Support\Str::limit($review->content, 70) }}
                        </td>

                        <td>
                            <div class="d-flex flex-wrap gap-2">
                                @if ($review->status === 'Aktif')
                                    <a 
                                        href="{{ route('admin.reviews.toggle', $review->id) }}" 
                                        class="btn btn-warning btn-sm toggle-review"
                                        data-message="Yakin ingin menonaktifkan review ini?"
                                    >
                                        Nonaktifkan
                                    </a>
                                @else
                                    <a 
                                        href="{{ route('admin.reviews.toggle', $review->id) }}" 
                                        class="btn btn-success btn-sm toggle-review"
                                        data-message="Yakin ingin mengaktifkan review ini?"
                                    >
                                        Aktifkan
                                    </a>
                                @endif

                                <form 
                                    action="{{ route('admin.reviews.destroy', $review->id) }}" 
                                    method="POST"
                                    class="action-form delete-form"
                                >
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </div>
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

@push('scripts')
<script>
    $(document).ready(function () {
        $('#reviewTable').DataTable({
            pageLength: 10,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ data",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ data",
                infoEmpty: "Tidak ada data",
                zeroRecords: "Data tidak ditemukan",
                paginate: {
                    first: "Pertama",
                    last: "Terakhir",
                    next: "Selanjutnya",
                    previous: "Sebelumnya"
                }
            }
        });
    });

    $('.toggle-review').on('click', function (event) {
        event.preventDefault();

        const url = $(this).attr('href');
        const message = $(this).data('message');

        Swal.fire({
            title: 'Konfirmasi',
            text: message,
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Ya, lanjutkan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });

    $('.delete-form').on('submit', function (event) {
        event.preventDefault();

        const form = this;

        Swal.fire({
            title: 'Yakin ingin menghapus review?',
            text: 'Review yang dihapus tidak dapat dikembalikan.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
</script>
@endpush