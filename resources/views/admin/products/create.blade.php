@extends('layouts.admin')

@section('title', 'Tambah Produk - GlowRate')

@section('page-title', 'Tambah Produk')

@section('content')
<div class="soft-card">

    <h4 class="fw-bold mb-4">
        Tambah Produk
    </h4>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form
        action="{{ route('admin.products.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf

        <div class="mb-3">
            <label class="form-label">Kategori</label>

            <select
                name="category_id"
                class="form-control"
                required
            >
                <option value="">Pilih Kategori</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Nama Produk</label>

            <input
                type="text"
                name="name"
                class="form-control"
                value="{{ old('name') }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Merek</label>

            <input
                type="text"
                name="brand"
                class="form-control"
                value="{{ old('brand') }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>

            <input
                type="number"
                name="price"
                class="form-control"
                value="{{ old('price') }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>

            <textarea
                name="description"
                rows="5"
                class="form-control"
                required
            >{{ old('description') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="form-label">Gambar Produk</label>

            <input
                type="file"
                name="image"
                class="form-control"
            >
        </div>

        <button
            type="submit"
            class="btn btn-primary"
        >
            Simpan Produk
        </button>

    </form>

</div>
@endsection