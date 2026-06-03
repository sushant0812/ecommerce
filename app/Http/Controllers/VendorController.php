<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vendor;
use Illuminate\Support\Str;

class VendorController extends Controller
{
    public function create()
{
    return view('vendor.create');
}

public function store(Request $request)
{
    $request->validate([
        'shop_name' => 'required',
        'description' => 'nullable',
    ]);

    Vendor::create([
        'user_id' => auth()->id(),
        'shop_name' => $request->shop_name,
        'slug' => Str::slug($request->shop_name),
        'description' => $request->description,
        'status' => 'pending',
    ]);

    return redirect('/')->with('success', 'Vendor request submitted!');
}

public function index()
{
    $vendors = Vendor::with('user')->get();
    return view('admin.vendors.index', compact('vendors'));
}

public function approve($id)
{
    $vendor = Vendor::findOrFail($id);
    $vendor->status = 'approved';
    $vendor->save();

    return back()->with('success', 'Vendor approved');
}

public function reject($id)
{
    $vendor = Vendor::findOrFail($id);
    $vendor->status = 'rejected';
    $vendor->save();

    return back()->with('success', 'Vendor rejected');
}
}
