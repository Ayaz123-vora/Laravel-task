<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
class HomeController extends Controller
{
  public function index()
{
    $categories = \App\Models\Category::all();
    $products = \App\Models\Product::latest()->take(6)->get();
    $orders = \App\Models\Order::with('user', 'cart.product')->latest()->take(3)->get();

    return view('home', compact('categories', 'products', 'orders'));
   
    
}
  


}