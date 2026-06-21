<h1>Dashboard Admin GlowRate</h1>

<p>Total User: {{ $totalUsers }}</p>
<p>Total Kategori: {{ $totalCategories }}</p>
<p>Total Produk: {{ $totalProducts }}</p>
<p>Total Review: {{ $totalReviews }}</p>
<p>Review Aktif: {{ $activeReviews }}</p>
<p>Review Nonaktif: {{ $pendingReviews }}</p>

<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>

<hr>

<h2>Review Terbaru</h2>

@forelse ($latestReviews as $review)
    <div style="border: 1px solid #ddd; padding: 10px; margin-bottom: 8px;">
        <p><strong>Produk:</strong> {{ $review->product->name ?? '-' }}</p>
        <p><strong>User:</strong> {{ $review->user->name ?? '-' }}</p>
        <p><strong>Rating:</strong> {{ $review->rating }}/5</p>
        <p><strong>Status:</strong> {{ $review->status }}</p>
        <p>{{ $review->content }}</p>
    </div>
@empty
    <p>Belum ada review.</p>
@endforelse