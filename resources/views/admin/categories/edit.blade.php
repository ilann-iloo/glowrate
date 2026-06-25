@extends('layouts.admin')

@section('title', 'Edit Kategori - GlowRate')

@section('page-title', 'Edit Kategori')

@section('content')

<div class="soft-card">

    <h5 class="fw-bold mb-4">Form Edit Kategori</h5>

    <form
        action="{{ route('admin.categories.update', $category->id) }}"
        method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nama Kategori</label>

            <input
                type="text"
                name="name"
                class="form-control"
                value="{{ old('name', $category->name) }}"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>

            <textarea
                name="description"
                class="form-control"
                rows="4">{{ old('description', $category->description) }}</textarea>
        </div>

        <button type="submit" class="btn btn-main">
            Update
        </button>

        <a
            href="{{ route('admin.categories.index') }}"
            class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection