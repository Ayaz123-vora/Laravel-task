@extends('layouts.app')

@section('content')
<h2>{{ $product->name }}</h2>
<p><strong>Category</strong> {{ $product->category->name ?? '' }}</p>
<p><strong>Price</strong> ${{ number_format($product->price, 2) }}</p>
<p><strong>Description</strong></p>
<p>{{ $product->description }}</p>

<form action="{{ route('cart.add', $product) }}" method="POST" class="mb-3">
    @csrf
    <button type="submit" class="btn btn-primary">Add to Cart</button>
</form>

<h4>Related Products in Same Category</h4>
@if($relatedProducts->isEmpty())
    <p>No related products found.</p>
@else
    <ul class="list-group">
        @foreach($relatedProducts as $related)
            <li class="list-group-item">
                <a href="{{ route('products.show', $related) }}">{{ $related->name }}</a> - ${{ number_format($related->price, 2) }}
</li>
        @endforeach
</ul>
@endif
<a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Back to Products</a>
@endsection