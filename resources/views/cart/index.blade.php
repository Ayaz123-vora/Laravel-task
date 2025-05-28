@extends('layouts.app')

@section('content')
<h2>Your Cart</h2>

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
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach($cart as $id => $item)
                @php $total = $item['price'] * $item['quantity']; @endphp
                @php $grandTotal += $total; @endphp
                <tr>
                    <td>{{ $item['name'] }}</td>
                    <td>{{ $item['quantity'] }}</td>
                    <td>${{ number_format($item['price'], 2) }}</td>
                    <td>${{ number_format($total, 2) }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <th colspan="3" class="text-end">Grand Total:</th>
                <th>${{ number_format($grandTotal, 2) }}</th>
                <th></th>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('checkout') }}" class="btn btn-success">Proceed to Checkout</a>
@endif
@endsection