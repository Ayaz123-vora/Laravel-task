<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Order;

class Cart extends Model
{
    protected $table = 'cart'; // Use singular table name if DB uses it
    protected $fillable = ['order_id', 'products_id', 'quantity', 'price'];

    // Define relationship to Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // Define relationship to Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function user()
  {
    return $this->belongsTo(User::class);
  }

}
