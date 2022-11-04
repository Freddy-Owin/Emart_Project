<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    /**
     * Get all of the comments for the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    protected static function booted()
    {
        static::creating(function ($order) {
            $lastOrderId = Order::latest()->first()->id ?? 0;
            $order->order_number = strtoupper(Str::random(2))."-".str_pad($lastOrderId + 1, 5, '0', STR_PAD_LEFT);
            // dd($order);
        });
    }

    public function orderItem()
    {
        return $this->hasMany(OrderItem::class);
    }
}
