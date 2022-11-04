<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Authenticatable
{
    use HasFactory;

    protected $guarded = [];

    /**
     * The roles that belong to the Customer
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function carts()
    {
        return $this->belongsToMany(Product::class, 'cart', 'customer_id', 'product_id')->withPivot('quantity','id');
    }

    public function order() {
        return $this->hasMany(Order::class, 'customer_id');
    }
}
