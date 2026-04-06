@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Product Catalog</h1>
        <a href="{{ route('admin.products.index') }}" class="btn btn-outline-primary btn-sm">Go to Admin</a>
    </div>

    <div class="row g-3">
        @forelse($products as $product)
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm">
                    @if($product->image_url)
                        <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text text-muted small mb-2">SKU: {{ $product->sku }}</p>
                        <p class="card-text flex-grow-1">{{ \Illuminate\Support\Str::limit($product->description, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="fw-bold">${{ number_format($product->price, 2) }}</span>
                            <a href="{{ route('products.show', $product) }}" class="btn btn-primary btn-sm">View</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">No products available.</div>
            </div>
        @endforelse
    </div>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
@endsection
