<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Customer;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $customers = Customer::all();
        $products = Product::all();
        $categories = Brand::all();
        $brands = Brand::all();
        return view('admin.dashboard.dashboard', compact(
            'products', 'brands', 'categories', 'customers'
        ));
    }

    public function customers()
    {
        $customers = Customer::all();
        return view('admin.dashboard.customers', compact('customers'));
    }

    public function orders()
    {
        $orders = Order::all();
        return view('admin.dashboard.order', compact('orders'));
    }
}
