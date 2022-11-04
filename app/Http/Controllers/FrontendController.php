<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function welcome()
    {
        $sliders = Slider::all();
        $products = Product::latest()->paginate(6);
        $brands = Brand::all();
        $categories = Category::all();
        return view('welcome', compact('products', 'brands', 'categories', 'sliders'));
    }

    public function carts()
    {
        if(auth('customer')->check())
        {
            $sliders = Slider::all();
            $products = auth('customer')->user()->carts;
            $total = $products->reduce(function( $carry, $product){
                return ($product->price * $product->pivot->quantity) + $carry;
            });
            $quantities = $products->reduce(function( $carry, $product){
                return $product->pivot->quantity + $carry;
            });
            $brands = Brand::all();
            $categories = Category::all();
            return view('customers.carts', compact('products', 'brands', 'categories', 'sliders', 'total', 'quantities'));
        }
        else
        {
            return redirect()->route('customer.login');
        }
    }

    public function brandAll()
    {
        $brands = Brand::all();
        $products = Product::all();
        $categories = Category::all();
        return view('customers.brandAll', compact('brands', 'products', 'categories'));
    }

    public function brandSelect(Brand $brand)
    {
        $brands = Brand::all();
        $products = Product::all();
        $categories = Category::all();
        return view('customers.brandSelect', compact('brands', 'products', 'categories', 'brand'));
    }

    public function categoryAll()
    {
        $brands = Brand::all();
        $products = Product::all();
        $categories = Category::all();
        return view('customers.categoryAll', compact('brands', 'products', 'categories'));
    }

    public function categorySelect(Category $category)
    {
        $brands = Brand::all();
        $products = Product::all();
        $categories = Category::all();
        return view('customers.categorySelect', compact('brands', 'products', 'categories', 'category'));
    }

    public function productDetail(Product $product)
    {
        $brands = Brand::all();
        $products = Product::all();
        $categories = Category::all();
        return view('customers.productDetail', compact('brands', 'products', 'categories', 'product'));
    }

    
}
