@extends('layouts.admin')

@section('title', 'Edit Review')

@section('page-title', 'Edit Review')

@section('content')
<div class="soft-card">
    <h5 class="mb-3">Edit Review</h5>

    <form action="{{ route('admin.reviews.update', $review->id) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- RATING --}}
        <div class="mb-3">
            <label class="form-label">Rating</label>
            <select name="rating" class="form-control" required>
                @for ($i = 1; $i <= 5; $i++)
                    <option value="{{ $i }}" {{ $review->rating == $i ? 'selected' : '' }}>
                        {{ $i }} Bintang
                    </option>
                @endfor
            </select>
        </div>

        {{-- content --}}
        <div class="mb-3">
            <label class="form-label">Komentar</label>
            <textarea name="content" class="form-control" rows="4" required>{{ $review->content }}</textarea>
        </div>

        {{-- STATUS --}}
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="Aktif" {{ $review->status == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                <option value="Nonaktif" {{ $review->status == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
            </select>
        </div>

        {{-- BUTTON --}}
        <button type="submit" class="btn btn-success">
            Update Review
        </button>

        <a href="{{ route('admin.reviews.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </form>
</div>
@endsection