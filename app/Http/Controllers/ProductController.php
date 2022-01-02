<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        //dd($product);
        return view('shop.index')->with('products', $product);
    }

    public function show($id)
    {
        $product = Product::FindOrFail($id);
        //dd($product);
        return view('shop.show')->with('product', $product);
    }
}
