<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;

class AdminController extends Controller
{
    public function users()
    {
        $users = User::withCount('orders')->get();
        return view('admin.users.index', compact('users'));
    }

    public function userOrders($id)
    {
        $user = User::findOrFail($id);
        $orders = $user->orders()->with('cart.product')->latest()->get();
        return view('admin.users.orders', compact('user', 'orders'));
    }
}

