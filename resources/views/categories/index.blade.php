@extends('layouts.app')

@section('content')
<h2>Product Categories</h2>
@if($categories->isEmpty())
    <p>No categories available.</p>
@else
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach($categories as $category)
            <div class="col">
                <div class="card h-100">
                    <div class="card-body d-flex flex-column justify-content-center text-center">
                        <h5 class="card-title">
                            <a href="{{ route('category.products', $category) }}">{{ $category->name }}</a>
                        </h5>
                        <div class="mt-auto d-flex justify-content-center gap-2">
                            <a href="{{ route('categories.edit', $category) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                        <a href="{{ route('category.products', $category) }}" class="btn btn-primary mt-3">ViewProducts</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection