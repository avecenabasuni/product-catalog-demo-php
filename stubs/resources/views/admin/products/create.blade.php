@extends('layouts.app')

@section('content')
    <h1 class="h3 mb-3">Add Product</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.products.store') }}" method="POST">
                @csrf

                @include('admin.products.partials.form', ['product' => null])

                <div class="mt-3 d-flex gap-2">
                    <button class="btn btn-success" type="submit">Create</button>
                    <a href="{{ route('admin.products.index') }}" class="btn btn-outline-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>
@endsection
