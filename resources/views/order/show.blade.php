@extends('layouts.app')

@section('content')
<h2>Order #{{ $order->id }} Details</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Product</th>
            <th>Quantity</th>
            <th>Price Per Unit</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order->items as $item)
        <tr>
            <td>{{ $item->product->name ?? 'Product deleted' }}</td>
            <td>{{ $item->quantity }}</td>
            <td>${{ number_format($item->price, 2) }}</td>
            <td>${{ number_format($item->price * $item->quantity, 2) }}</td>
        </tr>
        @endforeach
        <tr>
            <th colspan="3" class="text-end">Order Total:</th>
            <th>${{ number_format($order->total, 2) }}</th>
        </tr>
    </tbody>
</table>

<a href="{{ route('home') }}" class="btn btn-primary">Back to Home</a>
@endsection