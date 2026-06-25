@extends('layouts.admin')

@section('title', 'Edit Produk - GlowRate')

@section('page-title', 'Edit Produk')

@section('content')
<div class="soft-card">

    <h4 class="fw-bold mb-4">
        Edit Produk
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
        action="{{ route('admin.products.update', $product->id) }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Kategori</label>

            <select
                name="category_id"
                class="form-control"
                required
            >
                @foreach ($categories as $category)
                    <option
                        value="{{ $category->id }}"
                        {{ $product->category_id == $category->id ? 'selected' : '' }}
                    >
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
                value="{{ old('name', $product->name) }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Merek</label>

            <input
                type="text"
                name="brand"
                class="form-control"
                value="{{ old('brand', $product->brand) }}"
                required
            >
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>

            <input
                type="number"
                name="price"
                class="form-control"
                value="{{ old('price', $product->price) }}"
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
            >{{ old('description', $product->description) }}</textarea>
        </div>

        @if ($product->image)
            <div class="mb-3">
                <img
                    src="{{ asset('storage/' . $product->image) }}"
                    width="150"
                    class="img-thumbnail"
                >
            </div>
        @endif

        <div class="mb-4">
            <label class="form-label">
                Ganti Gambar
            </label>

            <input
                type="file"
                name="image"
                class="form-control"
            >
        </div>

        <button
            type="submit"
            class="btn btn-warning"
        >
            Update Produk
        </button>

    </form>

</div>
@endsection