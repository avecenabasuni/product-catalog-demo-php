@extends('layouts.app')

@section('content')
    <div class="mb-3">
        <a href="{{ route('products.index') }}" class="btn btn-link px-0">&larr; Back to products</a>
    </div>

    <div class="card shadow-sm">
        @if($product->image_url)
            <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}" style="max-height: 420px; object-fit: cover;">
        @endif

        <div class="card-body">
            <h1 class="h3">{{ $product->name }}</h1>
            <p class="text-muted mb-1">SKU: {{ $product->sku }}</p>
            <p class="fs-5 fw-bold mb-3">${{ number_format($product->price, 2) }}</p>
            <p class="mb-0">{{ $product->description }}</p>
        </div>
    </div>
@endsection
