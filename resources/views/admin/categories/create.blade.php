@extends('layouts.admin')

@section('title', 'Tambah Kategori - GlowRate')

@section('page-title', 'Tambah Kategori')

@section('content')
<div class="soft-card">

    <h5 class="fw-bold mb-4">Form Tambah Kategori</h5>

    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <input type="text"
                   name="name"
                   class="form-control"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description"
                      rows="4"
                      class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-main">
            Simpan
        </button>

        <a href="{{ route('admin.categories.index') }}"
           class="btn btn-secondary">
            Kembali
        </a>
    </form>

</div>
@endsection