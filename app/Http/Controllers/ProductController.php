<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);
             $data = [];
        $products = Product::all();
        foreach ($products as $item) {
            $data[] = [
                'product_id' => $item->id,
                // Add other fields as needed
            ];
        }

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Product created successfully.');
        return redirect()->route('products.index')->with('success', 'Data processed successfully.');
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
        ]);
        $product->update($request->all());
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function show(Product $product)
    {
        $relatedProducts = Product::where('category_id', $product->category_id)->where('id', '!=', $product->id)->get();
        return view('products.show', compact('product', 'relatedProducts'));
    }

   
    public function productsByCategory($categoryId)
{
    $category = Category::findOrFail($categoryId);
    $products = Product::where('category_id', $categoryId)->get();

    // Retrieve product IDs for the specific category
    $productIds = Product::where('category_id', $categoryId)->pluck('id');

    return view('products.index', compact('products', 'category', 'productIds'));
}   
    public function processProducts()
{
    $data = [];
    $products = Product::all();

    foreach ($products as $item) {
        $data[] = [
            'product_id' => $item->id,
            // other fields
        ];
    }

    // Do something with $data...

    return view('someview', compact('data'));
}

  

      public function destroy(Product $product)
  {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

}

