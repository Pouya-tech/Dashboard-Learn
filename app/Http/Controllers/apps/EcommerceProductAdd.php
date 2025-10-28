<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class EcommerceProductAdd extends Controller
{
  public function index()
  {
      return view('content.apps.app-ecommerce-product-add');
  }

  public function store(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required|string|max:35',
      'description' => 'nullable|string',
      'price' => 'required|numeric',
      'stock' => 'required|integer'
    ]);
    //  html پاک کردن تگ های اضافی
    $validated['description'] = is_string($validated['description'])
  ? strip_tags($validated['description']):'';
    // dd($validated);
    Product::create($validated);

    return redirect()->route('app-ecommerce-product-add')->with('success' , 'محصول با موفقیت اضافه شد');
  }
}
