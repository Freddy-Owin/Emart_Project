<?php

namespace App\Http\Controllers;

use App\Models\OrderItem;
use App\Models\Order;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    public function orderView()
    {
        // dd(auth('customer')->user()->order);
        $carts = auth('customer')->user()->carts;
        $quantities = $carts->reduce(function($carry, $cart){
            return $cart->pivot->quantity + $carry;
        });

        $total = $carts->reduce(function( $carry, $cart){
            return ($cart->pivot->quantity * $cart->price) + $carry;
        });
        return view('customers.orderView', compact('quantities', 'carts', 'total'));
    }

    public function order(Request $request)
    {
        $request->validate([
            'customer_phone' => 'required',
            'customer_address' => 'required',
        ]);

        $carts = auth('customer')->user()->carts;

        $quantities = $carts->reduce(function($carry, $cart){
            return $cart->pivot->quantity + $carry;
        });

        $total = $carts->reduce(function( $carry, $cart){
            return ($cart->pivot->quantity * $cart->price) + $carry;
        });
        // $lastOrderId = Order::latest()->first()->id ?? 0;
        DB::beginTransaction();
        try{
            $order = new Order();
            $order->customer_id = auth('customer')->user()->id;
            $order->customer_name = auth('customer')->user()->name;
            // $order->order_number = strtoupper(Str::random(2))."-".str_pad($lastOrderId + 1, 5, '0', STR_PAD_LEFT);
            $order->total_amount = $total;
            $order->grand_total = $total - $order->discount;
            $order->customer_phone = $request->customer_phone;
            $order->customer_address = $request->customer_address;
            $order->total_quantity = $quantities;

            if($order->save()) {
                $carts->map(function($cart) use($order){
                    $orderItem = new OrderItem();
                    $orderItem->order_id = $order->id;
                    $orderItem->product_id = $cart->id;
                    $orderItem->quantity = $cart->pivot->quantity;
                    $orderItem->unit_price = $cart->price;
                    $orderItem->amount= $orderItem->price = $cart->price * $cart->pivot->quantity;
                    $orderItem->save();
                });
            }
            Cart::where('customer_id', auth('customer')->user()->id)->delete();
        } catch (\Exception $e){
            DB::rollback();
            return back()->with('wrong','Something went wrong');
        }
        DB::commit();
        return redirect()->route('carts')->with('success', 'Your order has been successfully received!');
    }
}
