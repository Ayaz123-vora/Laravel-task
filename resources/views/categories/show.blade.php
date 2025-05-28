@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Products in Category: {{ $category->name }}</h2>

    <div class="row mt-4">
        @forelse($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                    <div class="card-body">
                        <h5>{{ $product->name }}</h5>
                        <p>${{ $product->price }}</p>
                        <a href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-primary">View</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No products found in this category.</p>
        @endforelse
    </div>
</div>
@endsection
