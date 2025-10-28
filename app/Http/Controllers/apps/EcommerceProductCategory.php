<?php

namespace App\Http\Controllers\apps;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class EcommerceProductCategory extends Controller
{
  public function index()
  {
    $products = Product::all();

    return view('content.apps.app-ecommerce-category-list' , compact('products'));
  }
}
