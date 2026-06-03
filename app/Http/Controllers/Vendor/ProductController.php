<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index()
{
    $products = Product::where('vendor_id', auth()->user()->vendor->id)->get();
    return view('vendor.products.index', compact('products'));
}

public function create()
{
    $categories = Category::all();
    return view('vendor.products.create', compact('categories'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required',
        'category_id' => 'required',
    ]);

    Product::create([
        'vendor_id' => auth()->user()->vendor->id,
        'category_id' => $request->category_id,
        'name' => $request->name,
        'slug' => \Str::slug($request->name),
        'price' => $request->price,
        'stock' => $request->stock ?? 0,
        'description' => $request->description,
    ]);

    return redirect('/vendor/products')->with('success', 'Product added!');
}
}
