<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(7);
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.create', compact('brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,svg',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
        ]);

        if($request->has('image'))
        {
            $imageName = time(). "_" . $request->image->getClientOriginalName();
            $request->image->move(public_path('storage/products'), $imageName);
            Product::create([
                'name' => $request->name,
                'image' => $imageName,
                'description' => $request->description,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id
            ]);

            return redirect()->route('products.index')->with('created', 'A new product has been created successfully!');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('admin.products.edit', compact('product', 'categories', 'brands'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg,svg',
            'description' => 'required',
            'price' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
        ]);

        if($request->has('image'))
        {
            unlink(public_path('storage/products/').$product->image);
            $imageName = time(). "_" . $request->image->getClientOriginalName();
            $request->image->move(public_path('storage/products'), $imageName);
            $product->update([
                'name' => $request->name,
                'image' => $imageName,
                'description' => $request->description,
                'price' => $request->price,
                'category_id' => $request->category_id,
                'brand_id' => $request->brand_id
            ]);

            return redirect()->route('products.index')->with('updated', 'Your product has been updated successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $path = public_path('storage/products/').$product->image;
        if(file_exists($path))
        {
            unlink($path);
            $product->delete();
            return redirect()->route('products.index')->with('deleted', 'Your product has been deleted successfully!');
        }
        else
        {
            return redirect()->back()->with('error', 'Image Not Found!');
        }

    }
}
