@extends('layouts.app')

@section('content')
<h2>Checkout</h2>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(empty($cart) || count($cart) === 0)
    <p>Your cart is empty.</p>
@else
    <table class="table">
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price per unit</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach($cart as $item)
                @php $total = $item['price'] * $item['quantity']; @endphp
                @php $grandTotal += $total; @endphp
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>${{ number_format($item['price'], 2) }}</td>
                    <td>${{ number_format($total, 2) }}</td>
                </tr>
            @endforeach
            <tr>
                <th colspan="3" class="text-end">Grand Total:</th>
                <th>${{ number_format($grandTotal, 2) }}</th>
            </tr>
        </tbody>
    </table>

    <form action="{{ route('order.place') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Place Order</button>
        <a href="{{ route('cart.index') }}" class="btn btn-secondary">Back to Cart</a>
    </form>
@endif
@endsection