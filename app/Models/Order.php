<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user()
{
    return $this->belongsTo(User::class);
}
   protected $fillable = [
    'user_id',
    'total',
    'status',
];


    public function cart()
{
    //return $this->hasMany(cart::class);
        return $this->hasMany(Cart::class, 'order_id');
}
      
    
}


