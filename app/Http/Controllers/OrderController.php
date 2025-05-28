<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // Place the order and redirect to show page
    public function placeOrder(Request $request)
{
    $cart = session()->get('cart', []);
    if (empty($cart)) {
        return redirect()->back()->with('error', 'Your cart is empty.');
    }

    // Calculate total price
    $total = 0;
    foreach ($cart as $item) {
        // Check if the required keys exist
        if (isset($item['price'], $item['quantity'])) {
            $total += $item['price'] * $item['quantity'];
        } else {
            \Log::error('Missing price or quantity in cart item', ['item' => $item]);
            return redirect()->back()->with('error', 'Cart item is missing required information.');
        }
    }

    // Create order
    $order = Order::create([
        'user_id' => Auth::id(),
        'total' => $total,
    ]);

    // Create order items
    foreach ($cart as $item) {
        // Check if the required keys exist
        if (isset($item['id'], $item['quantity'], $item['price'])) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'], // Accessing 'id' as an array key
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        } else {
            // Log the error if keys are missing
            \Log::error('Missing keys in cart item', ['item' => $item]);
            return redirect()->back()->with('error', 'Cart item is missing required information.');
        }
    }

    // Clear cart
    session()->forget('cart');
    \Log::info('Cart contents', ['cart' => $cart]);
    return redirect()->route('order.show', $order->id)
                     ->with('success', 'Order placed successfully.');
}


    // Show the order and its items
    public function show($orderId)
    {
        $order = Order::with('items.product')->where('id', $orderId)
                    ->where('user_id', Auth::id())
                    ->firstOrFail();

        return view('order.show', compact('order'));
    }
       public function checkout()
 {
    $cart = session()->get('cart', []);
    return view('order.checkout', compact('cart'));
 }

}
