@extends('layouts.admin')

@section('title', 'Kelola User - GlowRate')

@section('page-title', 'Kelola User')

@section('content')
<div class="soft-card">

    <div class="mb-3">
        <h5 class="fw-bold mb-1">Data User</h5>
        <p class="text-muted mb-0">
            Halaman ini digunakan untuk mengelola akun pengguna.
        </p>
    </div>

    <div class="table-responsive">
        <table class="table align-middle" id="userTable">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Tanggal Daftar</th>
                    <th width="120">Aksi</th>
                </tr>
            </thead>

            <tbody>
                @forelse($users as $user)
                    <tr>

                        <td>
                            {{ $loop->iteration }}
                        </td>

                        <td class="fw-semibold">
                            {{ $user->name }}
                        </td>

                        <td>
                            {{ $user->email }}
                        </td>

                        <td>
                            @if($user->role === 'admin')
                                <span class="badge bg-danger">
                                    Admin
                                </span>
                            @else
                                <span class="badge bg-primary">
                                    User
                                </span>
                            @endif
                        </td>

                        <td>
                            {{ $user->created_at->format('d M Y') }}
                        </td>

                        <td>

                            @if($user->id != auth()->id())

                            <form
                                action="{{ route('admin.users.destroy', $user->id) }}"
                                method="POST"
                                class="delete-user-form"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm"
                                >
                                    Hapus
                                </button>
                            </form>

                            @else

                            <span class="badge bg-secondary">
                                Akun Anda
                            </span>

                            @endif

                        </td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center text-muted py-4">
                            Belum ada user.
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

    $('#userTable').DataTable({
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

$('.delete-user-form').on('submit', function (event) {

    event.preventDefault();

    const form = this;

    Swal.fire({
        title: 'Yakin ingin menghapus user?',
        text: 'Data user akan dihapus permanen.',
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