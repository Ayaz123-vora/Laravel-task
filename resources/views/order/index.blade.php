@extends('Layouts.app')

@section('content')
<h2>Your Orders</h2>
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if($orders->isEmpty())
    <p>You have no orders yet.</p>
@else
    @foreach($orders as $order)
        <div class="card mb-3">
            <div class="card-header">
                Order #{{ $order->id }} - Placed on {{ $order->created_at->format('Y-m-d H:i') }}
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @if($order->items && $order->items->isNotEmpty()) {{-- Check if items exist --}}
                        @foreach($order->items as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                {{ $item->product->name ?? 'Product Deleted' }} (Qty: {{ $item->quantity }})
                                <span>${{ number_format($item->price * $item->quantity, 2) }}</span>
                            </li>
                        @endforeach
                    @else
                        <li class="list-group-item">No items found for this order.</li>
                    @endif
                </ul>
                <h5 class="mt-2">Total: ${{ number_format($order->total, 2) }}</h5>
            </div>
        </div>
    @endforeach
@endif
@endsection