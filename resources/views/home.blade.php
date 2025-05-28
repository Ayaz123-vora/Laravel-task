@extends('layouts.app')

@section('content')
<div class="text-center mb-4">
    <h1>Welcome to Our Store</h1>
    <p>Explore our categories and products below.</p>
</div>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Product Categories</h2>
    <a href="{{ route('categories.create') }}" class="btn btn-success">Add Category</a>
</div>

@if($categories->isEmpty())
    <p>No categories available.</p>
@else
    <div class="row row-cols-1 row-cols-md-3 g-4 mb-5">
        @foreach($categories as $category)
            <div class="col">
                <div class="card h-100 text-center">
                    <div class="card-body d-flex flex-column justify-content-center">
                        <h5 class="card-title">{{ $category->name }}</h5>
                        <a href="{{ route('category.products', $category) }}" class="btn btn-primary mt-3">View Products</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

<h2>Products</h2>
@if($products->isEmpty())
    <p>No products available.</p>
@else
    <div class="row row-cols-1 row-cols-md-4 g-4">
        @foreach($products as $product)
            <div class="col">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column justify-content-between">
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">${{ number_format($product->price, 2) }}</p>
                        <form action="{{ route('cart.add', $product) }}" method="POST" class="mt-auto">
                            @csrf
                            <button type="submit" class="btn btn-primary w-100">Add to Cart</button>
                        </form>
                        <a href="{{ route('products.show', $product) }}" class="btn btn-link mt-2">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection