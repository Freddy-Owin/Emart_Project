<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    protected $guarded = [];

    public function getTotalPriceAttribute()
    {
        return $this->product->price * $this->quantity;
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
