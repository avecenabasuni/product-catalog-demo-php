@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-3">Edit Product</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.products.update', $product) }}" method="POST">
                @csrf
                @method('PUT')

                @include('admin.products.partials.form', ['product' => $product])

                <div class="mt-3 d-flex gap-2">
                    <button class="btn btn-primary" type="submit">Save Changes</button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
